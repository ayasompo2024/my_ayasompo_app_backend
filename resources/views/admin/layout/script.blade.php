<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>

<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin/js/dashboard3.js') }}"></script>
<script src="{{ asset('admin/js/scrollreveal.js') }}"></script>
<script src="{{ asset('admin/js/SpideyShine.js') }}"></script>

<script>
    window.sr = new ScrollReveal();
    sr.reveal('.toright', {
        origin: 'left',
        duration: 900,
        distance: '90px'
    });
    sr.reveal('.toleft', {
        origin: 'right',
        duration: 900,
        distance: '90px'
    });
    sr.reveal('.toup', {
        origin: 'top',
        duration: 900,
        distance: '-90px'
    });
    sr.reveal('.todown', {
        origin: 'top',
        duration: 900,
        distance: '90px'
    });
</script>
<script type="text/javascript">
    $("img").lazyload({
        effect: "fadeIn"
    });
</script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if (Session::has('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ Session::get('success') }}"
        })
    @endif
    @if (Session::has('fail'))
        Toast.fire({
            icon: 'error',
            title: "{{ Session::get('fail') }}"
        })
    @endif
</script>
<script>
    const easymde = new EasyMDE({
        element: document.getElementById('editorForProperty'),
        toolbar: [
            "undo",
            "redo",
            "bold",
            "italic",
            "heading",
            "strikethrough",
            "unordered-list",
            "ordered-list",
            "horizontal-rule",
            "|",
            "link",
            "image",
            // "quote",
            // "code",
            "side-by-side",
            "preview",
            "guide"
        ]
    });
    const easymde2 = new EasyMDE({
        element: document.getElementById('editorForProperty2'),
        toolbar: [
            "undo",
            "redo",
            "bold",
            "italic",
            "heading",
            "strikethrough",
            "unordered-list",
            "ordered-list",
            "horizontal-rule",
            "|",
            "link",
            "image",
            // "quote",
            // "code",
            "side-by-side",
            "preview",
            "guide"
        ]
    });
</script>
