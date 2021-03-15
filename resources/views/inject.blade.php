<script src="https://www.google.com/recaptcha/api.js?render={{ $site_key }}"></script>
<script>
    window.recaptcha = {
        action: function (action_name) {
            grecaptcha.ready(function () {
                grecaptcha.execute('{{ $site_key }}', {action: action_name}).then(function (token) {
                    // Add your logic to submit to your backend server here.
                    console.log('recaptcha token: ' + token)
                    var name = '{{ $cookie_name  }}';
                    var date = new Date();
                    date.setTime(date.getTime() + (2 * 60 * 1000));
                    var expires = "; expires=" + date.toUTCString();
                    document.cookie = name + "=" + token + expires + "; path=/";
                });
            });
        },
    }
</script>
