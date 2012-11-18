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
 * Contains the Backbone.js models
 */
BugShark.models = {}

BugShark.models.Feedback = Backbone.Model.extend({
    //
})


BugShark.collections = {}


/*
 * Not ideal, but it'll have to do for now
 */
BugShark.templates = {
    toolbar:
        '<div id="bugshark-toolbar">' +
            '<div class="heading">Feedback</div>' +
            '<div class="message"></div>' +
            '<div class="content">' +
                '<textarea class="feedback" placeholder="Enter your feedback here"></textarea>' +
                '<div class="tools">' +
                    '<div class="tool highlight">' +
                        '<div class="icon"></div><span class="label">Highlight</span>' +
                        '<div class="clearfix"></div>' +
                    '</div>' +
                '</div>' +
                '<input class="submit" type="submit" value="Send Feedback"/>' +
            '</div>' +
        '</div>',

    overlay:
        '<div id="bugshark-overlay"></div>'
}


BugShark.views = {}

BugShark.views.ToolBar = Backbone.View.extend({
    collapsedWidth: 0,
    collapsedHeight: 0,
    expandedWidth: 200,
    expandedHeight: 240,
    expanded: false,

    events: {
        'click .heading': 'headingClick',
        'click .submit': 'submit',
        'click .tool.highlight': 'startHighlight'
    },

    initialize: function() {
        var el = $(BugShark.utils.renderTemplate('toolbar')).get(0)
        document.body.appendChild(el)
        this.setElement(el)
        this.collapsedWidth = this.$el.width()
        this.collapsedHeight = this.$el.height()
        if (BugShark.utils.getCookie('bugshark-toolbar-expanded')) {
            this.$el.width(this.expandedWidth)
            this.$el.height(this.expandedHeight)
            this.expanded = true
        }
    },

    headingClick: function() {
        if (!this.expanded) {
            this._expand()
        } else {
            this._collapse()
        }
    },

    submit: function() {
        var data = {
            comments: this.$el.find('.feedback').val(),
            track_id: BugShark.track_id
        }
        this._sendFeedback(data)
    },

    startHighlight: function() {
        BugShark.overlay.show()
    },

    _expand: function() {
        BugShark.utils.setCookie('bugshark-toolbar-expanded', 'true')
        this.expanded = true
        var el = this.$el;
        el.animate({
            width: this.expandedWidth,
            height: this.expandedHeight,
            complete: function() {
                el.find('.feedback').focus()
            }
        })
    },
    _collapse: function() {
        BugShark.utils.removeCookie('bugshark-toolbar-expanded')
        this.expanded = false
        this.$el.animate({
            width: this.collapsedWidth,
            height: this.collapsedHeight
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
        document.body.appendChild(el)
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
        this.$el.Jcrop({
            allowResize: false,
            allowMove: false
        })
    },
    hide: function() {
        this.$el.hide()
    },

    _resize: function() {
        if (this.displayed) {
            var $window = $(window)
            this.$el.width($window.width() - 2)
            this.$el.height($window.height() - 2)
        }
    }
})

BugShark.toolbar = new BugShark.views.ToolBar()
BugShark.overlay = new BugShark.views.Overlay()
