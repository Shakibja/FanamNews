 <!-- plugins:js -->
 <script src="{{asset('backend')}}/assets/vendors/js/vendor.bundle.base.js"></script>
 <!-- endinject -->
 <!-- Plugin js for this page -->
 <script src="{{asset('backend')}}/assets/vendors/chart.js/chart.umd.js"></script>
 <script src="{{asset('backend')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="{{asset('backend')}}/assets/js/off-canvas.js"></script>
 <script src="{{asset('backend')}}/assets/js/misc.js"></script>
 <script src="{{asset('backend')}}/assets/js/settings.js"></script>
 <script src="{{asset('backend')}}/assets/js/todolist.js"></script>
 <script src="{{asset('backend')}}/assets/js/jquery.cookie.js"></script>
 <!-- endinject -->
 <!-- Custom js for this page -->
 <script src="{{asset('backend')}}/assets/js/dashboard.js"></script>
 <!-- End custom js for this page -->

 <!-- Check Editor -->
 <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

 <script>
         ClassicEditor
                 .create(document.querySelector('#newsHighlightEditor'))
                 .then(editor => {
                         console.log(editor);
                 })
                 .catch(error => {
                         console.error(error);
                 });
 </script>

 <script>
         ClassicEditor
                 .create(document.querySelector('#newsBodyEditor'))
                 .then(editor => {
                         console.log(editor);
                 })
                 .catch(error => {
                         console.error(error);
                 });
 </script>

<script>
         ClassicEditor
                 .create(document.querySelector('#meta_des_BodyEditor'))
                 .then(editor => {
                         console.log(editor);
                 })
                 .catch(error => {
                         console.error(error);
                 });
 </script>