</div>
</div>

<script src="{{ asset('appstack/js/app.js') }}"></script>
<script src="{{ asset('appstack/js/sweetalert2/dist/sweetalert2.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    var currentYear = new Date().getFullYear();
    document.querySelector('.current-year').textContent = currentYear;
</script>

@stack('js')

</body>

</html>
