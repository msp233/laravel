{{-- js 加上meta标签 --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
       $.ajax({
           'url':'/login',
           'data':{
               'username':'msp',
           },
           headers:{
               "X-CSRF-TOKEN":$('meta[name="csrf-token').attr('content'),
           },
           'type':'post',
           success:function ($msg) {
               alert($msg);
           }

       })
    });
</script>