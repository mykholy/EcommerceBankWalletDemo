@if(Session::has('error'))

    <script>

        iziToast.error({
            timeout: 5000,
            theme: 'light',
            position: 'topRight',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            title: 'Error !',
            message: '{{session('error')}}',
        });


    </script>
@endif
