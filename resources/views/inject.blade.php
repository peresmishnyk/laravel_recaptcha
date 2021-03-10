<script src="https://www.google.com/recaptcha/api.js?render={{ $site_key }}"></script>
<script>
    window.recaptcha = {
        action : function(action_name){
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ $site_key }}', {action: action_name}).then(function(token) {
                    // Add your logic to submit to your backend server here.
                    console.log(token);
                    window.recaptcha.validate({token:token}).then(data => {
                        console.log(data); // JSON data parsed by `data.json()` call
                    });
                });
            });
        },
        validate : async function (data = {}) {
            // Default options are marked with *
            const response = await fetch('/laravel-recaptcha/validate', {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(data) // body data type must match "Content-Type" header
            });
            return response.json(); // parses JSON response into native JavaScript objects
        }
    }
</script>
