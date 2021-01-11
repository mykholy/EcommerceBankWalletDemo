@if(Session::has('success'))
    <script>
        iziToast.success({
            timeout: 3000,
            theme: 'light',
            position: 'topRight',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            title: '{{__('messages.done')}}',
            message: '{{session('success')}}',
        });


    </script>
@endif
