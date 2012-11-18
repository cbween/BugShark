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


BugShark.collections = {}


/*
 * Not ideal, but it'll have to do for now
 */
BugShark.templates = {
    toolbar:
        '<div id="bugshark-toolbar">' +
            '<div class="heading">Feedback</div>' +
            '<div class="content">' +
                '<textarea></textarea>' +
            '</div>' +
        '</div>'
}


BugShark.views = {}

BugShark.views.ToolBar = Backbone.View.extend({
    collapsedWidth: 0,
    collapsedHeight: 0,
    expandedWidth: 200,
    expandedHeight: 240,
    expanded: false,

    events: {
        'click .heading': 'headingClick'
    },

    initialize: function() {
        var el = $(BugShark.utils.renderTemplate('toolbar'))[0]
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

    headingClick: function(e) {
        if (!this.expanded) {
            this._expand()
        } else {
            this._collapse()
        }
    },

    _expand: function() {
        BugShark.utils.setCookie('bugshark-toolbar-expanded', 'true')
        this.expanded = true
        this.$el.animate({
            width: this.expandedWidth,
            height: this.expandedHeight
        })
    },
    _collapse: function() {
        BugShark.utils.removeCookie('bugshark-toolbar-expanded')
        this.expanded = false
        this.$el.animate({
            width: this.collapsedWidth,
            height: this.collapsedHeight
        })
    }
})

BugShark.toolbar = new BugShark.views.ToolBar()
