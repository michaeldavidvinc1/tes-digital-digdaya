<script src="{{ url('https://code.jquery.com/jquery-3.6.1.min.js') }}"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.datatables.net/2.0.8/js/dataTables.min.js') }}"></script>

<script src="{{ url('https://cdn.datatables.net/2.0.8/js/dataTables.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/select/2.0.3/js/dataTables.select.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/select/2.0.3/js/select.dataTables.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js') }}"></script>

<script>
    function formatRupiah(angka) {
        var numberString = angka.toString().replace(/[^,\d]/g, ''),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return 'Rp ' + rupiah + (split[1] ? ',' + split[1] : '');
    }
</script>
