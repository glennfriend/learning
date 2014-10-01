    <!-- reviewView template -->

    <script type="text/html" id="reviewView">
        <div class="thumbnail">
            <div class="caption">
                <h5>
                    {{name}}, {{date}}
                    <span class="rating-box" style="display:inline-block;">
                        <span class="rating" style="width:{{rating}}%;"></span>
                    </span>
                </h5>
                <p>{{content}}</p>
                <p>Share this review .........</p>
            </div>
        </div>
    </script>

    <script type="text/javascript" charset="utf-8">
        var reviewView = {
            setAll: function(data) {
                this.id         = data.id;
                this.name       = data.name;
                this.rating     = data.rating;
                this.date       = data.date;
                this.content    = data.content;
            },
            //
            // example:
            //      {{#backgroundColor}}{{color}}{{/backgroundColor}}
            //
            backgroundColor: function() {
                return function(text, render) {
                    return 'background-color: #'+text;
                    return "<b>" + render(text) + "</b>"
                }
            }
        };
    </script>
