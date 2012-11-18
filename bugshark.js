var BugShark = BugShark || {}


/*
 * Utility functions
 */
BugShark.utils = {
    renderTemplate: function(id, data) {
        var template = BugShark.templates[id]
        return Mustache.render(template, data)
    },

    getCookie: function(name) {
        var cookieArray = document.cookie.split('; ')
        for (var i = cookieArray.length - 1; i >= 0; i--) {
            var keyVal = cookieArray[i].split('=')
            if (keyVal[0] == name) {
                return keyVal[1]
            }
        }
    },

    setCookie: function(name, value, minutes) {
        // http://www.quirksmode.org/js/cookies.html
        var expires = ''
        if (minutes) {
            var date = new Date()
            date.setTime(date.getTime() + (minutes*60*1000))
            expires = '; expires=' + date.toGMTString()
        }
        document.cookie = name + '=' + value + expires + '; path=/'
    },

    removeCookie: function(name) {
        this.setCookie(name, '', -1)
    },

    /*
     * An empty function
     */
    empty: function empty() {}
}


/*
 * Not ideal, but it'll have to do for now
 */
BugShark.templates = {
    toolbar:
        '<div id="bugshark-toolbar">' +
            '<div class="top">' +
                '<a class="heading" href="#">Shark It!</a>' +
            '</div>' +
            '<div class="body">' +
                '<div class="message"></div>' +
                '<div class="feedbackconter">' +
                    '<textarea class="feedback" placeholder="Enter your feedback here"></textarea>' +
                    '<input class="email" type="text" placeholder="Your email (optional)"/>' +
                '</div>' +
                '<ul>' +
                    '<li class="tools">' +
                        '<ul>' +
                            '<li><a class="tool highlight" href="#"><span class="icon-hl"></span> highlight</a></li>' +
                        '</ul>' +
                    '</li>' +
                '</ul>' +
                '<div>' +
                    '<input class="submit" type="submit" value="Send Feedback" />' +
                '</div>' +
            '</div>' +
        '</div>',

    overlay:
        '<div id="bugshark-overlay"></div>'
}


BugShark.views = {}

BugShark.views.ToolBar = Backbone.View.extend({
    collapsedBottom: -295,
    expandedBottom: 0,
    expanded: false,

    events: {
        'click .heading': 'headingClick',
        'click .submit': 'submit',
        'click .tool.highlight': 'highlightClick'
    },

    initialize: function() {
        var el = $(BugShark.utils.renderTemplate('toolbar')).get(0)
        document.body.appendChild(el)
        this.setElement(el)
        if (BugShark.utils.getCookie('bugshark-toolbar-expanded')) {
            this.$el.css('bottom', this.expandedBottom)
            this.expanded = true
        }
    },

    headingClick: function(e) {
        e.preventDefault()
        if (!this.expanded) {
            this._expand()
        } else {
            this._collapse()
        }
    },

    submit: function() {
        var data = {
            comments: this.$el.find('.feedback').val(),
            track_id: BugShark.track_id,
            url: location.href,
            email: this.$el.find('.email').val()
        }
        this._sendFeedback(data)
    },

    highlightClick: function(e) {
        e.preventDefault()
        if (BugShark.overlay.displayed) {
            BugShark.overlay.hide()
        } else {
            BugShark.overlay.show()
        }
    },

    _expand: function() {
        BugShark.utils.setCookie('bugshark-toolbar-expanded', 'true')
        this.expanded = true
        var el = this.$el;
        el.animate({
            bottom: this.expandedBottom,
            complete: function() {
                el.find('.feedback').focus()
            }
        })
    },
    _collapse: function() {
        BugShark.utils.removeCookie('bugshark-toolbar-expanded')
        this.expanded = false
        this.$el.animate({
            bottom: this.collapsedBottom
        })
    },

    _sendFeedback: function(data) {
        // http://stackoverflow.com/a/6169703/104184

        var iframe = document.createElement('iframe')
        var name = 'secretForm'
        document.body.appendChild(iframe)
        iframe.style.display = 'none'
        iframe.contentWindow.name = name

        var form = document.createElement('form')
        form.target = name
        form.action = 'http://bugshark.com/testies/s'
        form.method = 'POST'

        _.each(data, function(value, key) {
            var input = document.createElement('input')
            input.type = 'hidden'
            input.name = key
            input.value = value
            form.appendChild(input)
        })

        var screenshotInput = document.createElement('input')
        screenshotInput.type = 'hidden'
        screenshotInput.name = 'screenshot'
        form.appendChild(screenshotInput)

        // Take the screenshot
        var el = this.$el
        $(document.body).html2canvas({
            onrendered: function(canvas) {
                var pngData = canvas.toDataURL('image/png').replace(/^data:image\/(png|jpg);base64,/, '')
                screenshotInput.value = pngData

                document.body.appendChild(form)
                form.submit()

                // Reset everything
                BugShark.overlay.hide()
                el.find('textarea').val('')
                el.find('.message').text('Thank you! Your feedback is appreciated.').fadeIn().delay(3000).fadeOut()
            }
        })
    }
})

BugShark.views.Overlay = Backbone.View.extend({
    displayed: false,

    initialize: function() {
        var el = $(BugShark.utils.renderTemplate('overlay')).get(0)
        $(document.body).prepend(el)
        this.setElement(el)
        var self = this
        $(window).resize(function() {
            self._resize()
        })
    },

    show: function() {
        this.$el.show()
        this.displayed = true
        this._resize()
        var self = this
        this.$el.Jcrop({
            allowResize: false,
            allowMove: false,
            bgOpacity: 0.4
        }, function() {
            self.jCrop = this
        })
    },
    hide: function() {
        this.$el.hide()
        if (this.jCrop) {
            this.jCrop.destroy()
        }
        this.displayed = false
    },

    _resize: function() {
        if (this.displayed) {
            var $window = $(document.body)
            this.$el.width($window.width() - 2)
            this.$el.height($window.height() - 2)
        }
    }
})

BugShark.toolbar = new BugShark.views.ToolBar()
BugShark.overlay = new BugShark.views.Overlay()
