<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Сжиматор ссылок</title>

        <!-- Styles -->
        <style>
            :root {
                background: #f5f6fa;
                color: #9c9c9c;
                font: 1rem "PT Sans", sans-serif;
            }

            html,
            body,
            .container {
                height: 100%;
            }

            a {
                color: inherit;
            }
            a:hover {
                color: #7f8ff4;
            }

            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .btn {
                display: inline-block;
                background: transparent;
                color: inherit;
                font: inherit;
                border: 0;
                outline: 0;
                padding: 0;
                transition: all 200ms ease-in;
                cursor: pointer;
            }
            .btn--primary {
                background: #7f8ff4;
                color: #fff;
                box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1);
                border-radius: 2px;
                padding: 12px 36px;
            }
            .btn--primary:hover {
                background: #6c7ff2;
            }
            .btn--primary:active {
                background: #7f8ff4;
                box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, 0.2);
            }
            .btn--inside {
                margin-left: -96px;
            }

            .form__field {
                width: 560px;
                background: #fff;
                color: #a3a3a3;
                font: inherit;
                box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.1);
                border: 0;
                outline: 0;
                padding: 22px 18px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="container__item">
                <form onsubmit="generateShortUrl(this);return false" class="form" autocomplete="off">
                    <input type="text" name="url" class="form__field" placeholder="Введите ссылку" />
                    <button type="submit" class="btn btn--primary btn--inside uppercase">Send</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        function generateShortUrl(form) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'api/short');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    form.url.value = data.shortUrl;

                    var copyText = form.url;
                    copyText.select();
                    copyText.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                }
            };
            xhr.send(JSON.stringify({
                url: form.url.value
            }));
            return false;
        }
    </script>
</html>
