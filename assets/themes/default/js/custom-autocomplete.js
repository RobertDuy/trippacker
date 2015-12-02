// Autocomplete */
(function($) {
    $.fn.autocomplete = function(option) {
        return this.each(function() {
            this.timer = null;
            this.items = new Array();
            this.htmlTemplate = '';

            $.extend(this, option);

            $(this).attr('autocomplete', 'off');

            // Focus
            $(this).on('focus', function() {
                this.request();
            });

            // Blur
            $(this).on('blur', function() {
                setTimeout(function(object) {
                    object.hide();
                }, 200, this);
            });

            // Keydown
            $(this).on('keydown', function(event) {
                switch(event.keyCode) {
                    case 27: // escape
                        this.hide();
                        break;
                    default:
                        this.request();
                        break;
                }
            });

            // Click
            this.click = function(event) {
                event.preventDefault();

                value = $(event.target).parent().attr('data-value');

                if (value && this.items[value]) {
                    this.select(this.items[value]);
                }
            }

            // Show
            this.show = function() {
                var pos = $(this).position();

                $(this).siblings('ul.dropdown-menu').css({
                    top: pos.top + $(this).outerHeight(),
                    left: pos.left
                });

                $(this).siblings('ul.dropdown-menu').show();
            }

            // Hide
            this.hide = function() {
                $(this).siblings('ul.dropdown-menu').hide();
            }

            // Request
            this.request = function() {
                clearTimeout(this.timer);

                this.timer = setTimeout(function(object) {
                    object.source($(object).val(), $.proxy(object.response, object));
                }, 200, this);
            }

            // Response
            this.response = function(json) {
                html = '';

                if (json.length) {
                    if(this.htmlTemplate.length > 0){
                        html = this.constructByTemplate(json);
                    }else{
                        html = this.defaultConstructHtml(json);
                    }
                }

                if (html) {
                    this.show();
                } else {
                    this.hide();
                }

                $(this).siblings('ul.dropdown-menu').html(html);
            }

            this.constructByTemplate = function(json){
                var html = ''; var i = 0;
                if(this.htmlTemplate.length > 0){
                    for(i = 0; i < json.length; i++){
                        var replaceHtml = this.htmlTemplate.replace("{{icon}}", json[i]['location_icon']);
                        replaceHtml = replaceHtml.replace("{{name}}", json[i]['location_name']);
                        html += replaceHtml;
                    }
                }
                return html;
            }

            this.defaultConstructHtml = function(json){
                // Default of auto-complete
                var html = ''; var i = 0;
                for (i = 0; i < json.length; i++) {
                    this.items[json[i]['value']] = json[i];
                }

                for (i = 0; i < json.length; i++) {
                    if (!json[i]['category']) {
                        html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
                    }
                }

                // Get all the ones with a categories
                var category = new Array();

                for (i = 0; i < json.length; i++) {
                    if (json[i]['category']) {
                        if (!category[json[i]['category']]) {
                            category[json[i]['category']] = new Array();
                            category[json[i]['category']]['name'] = json[i]['category'];
                            category[json[i]['category']]['item'] = new Array();
                        }

                        category[json[i]['category']]['item'].push(json[i]);
                    }
                }

                for (i in category) {
                    html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

                    for (j = 0; j < category[i]['item'].length; j++) {
                        html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
                    }
                }
                return html;
            }

            $(this).after('<ul class="dropdown-menu"></ul>');
            $(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

        });
    }
})(window.jQuery);