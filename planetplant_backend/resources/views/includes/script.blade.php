    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/Chart.js"></script>
    <script src="/js/mask.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link href="/css/component-chosen.css" rel="stylesheet">
    <script src="/js/chosen.jquery.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
        
    <script>
        $('.feat-btn').click(function(){
            $('nav ul .feat-show').toggleClass("show");
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataCustomer').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataAdmin').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataItemType').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataItem').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataPaymentType').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataPayment').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($){
            $('#showDataTransaction').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <script>
        function deleteDataAdmin(e){
            let data = e.getAttribute('data-id');
            let split = data.split('-');
            let id = split['0'];
            let name = split['2'];
            let code = split['1'];

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data "+code+"-"+name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText : 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url:'{{url("/admins/delete")}}',
                        data:{
                            "_token": "{{ csrf_token() }}",
                            id:id,_method: "delete"
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data) {
                            if(data.success){
                                location.reload(true);
                            }    
                        }
                    });
                }
            });
        }
    </script>

<script>
        function deleteDataItemType(e){
            let data = e.getAttribute('data-id');
            let split = data.split('.');
            let id = split['0'];
            let name = split['2'];
            let code = split['1'];

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data "+code+"-"+name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText : 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url:'{{url("/itemtypes/delete")}}',
                        data:{
                            "_token": "{{ csrf_token() }}",
                            id:id,_method: "delete"
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data) {
                            if(data.success){
                                location.reload(true);
                            }    
                        }
                    });
                }
            });
        }
    </script>

    <script type="application/javascript">

    function deleteDataItem(e){

        let data = e.getAttribute('data-id');
        let split = data.split('.');
        let id = split['0'];
        let name = split['2'];
        let code = split['1'];

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Menghapus data "+code+"-"+name,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText : 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'POST',
                    url:'{{url("/items/delete")}}',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id,_method: "delete"
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) {
                        if(data.success){
                            location.reload(true);
                        }    
                    }
                });
            }
        });
    }
    </script>

<script type="application/javascript">

function deleteDataPaymentType(e){

    let data = e.getAttribute('data-id');
            let split = data.split('-');
            let id = split['0'];
            let name = split['2'];
            let code = split['1'];

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data "+code+"-"+name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText : 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type:'POST',
                    url:'{{url("/paymenttypes/delete")}}',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id,_method: "delete"
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) {
                        if(data.success){
                            location.reload(true);
                        }    
                    }
                });
            }
        });
    }
</script>

    <div class="modal" id="showDataCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="showDataAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="showDataItemType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="showDataItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="showDataPaymentType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="showDataPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="showDataTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>