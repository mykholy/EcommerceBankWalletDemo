<script>


    $('.btn-danger').on('click', function (e) {

        var that = $(this);
        var attr_id=that.attr('id');


        iziToast.question({
            timeout: false,
            close: false,
            overlay: true,
            displayMode: 'replace',
            id: 'question',
            color: 'red',
            icon: 'icon-trash',
            zindex: 9999,
            close: true,
            title: '{{__('messages.delete')}}!',
            message: '{{__('messages.confirm_delete')}}',
            position: 'topCenter',
            buttons: [
                ['<button><b>{{__('messages.yes')}}</b></button>', function (instance, toast) {

                    instance.hide({transitionOut: 'fadeOut'}, toast, 'YES');
                    $('#Row'+attr_id).submit();

                }, true],
                ['<button>{{__('messages.no')}}</button>', function (instance, toast) {

                    instance.hide({transitionOut: 'fadeOut'}, toast, 'NO');

                }],
            ],

        });

    });


</script>
