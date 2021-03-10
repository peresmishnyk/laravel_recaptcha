function recaptcha(action) {
    grecaptcha.ready(function() {

        // grecaptcha.execute('{{ $site_key }}', {action: '{{ $action }}'}).then(function(token) {
        //     // Add your logic to submit to your backend server here.
        //     console.log(token);
        // });
    });
}
