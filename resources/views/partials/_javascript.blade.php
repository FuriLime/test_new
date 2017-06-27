<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script type="text/javascript">
$( document ).ready(function() {
    $('.button-remove').on('click', function(e) {
    var dataId = $(this).attr('data-id');
    $('.did').text($(this).data('id'));

    $.ajax({
        url: '{{ url('dashboard/categories') }}' + '/' + dataId,
        type: 'DELETE',
        data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text(),
            },
        success: function( data ) {
                $('.item-' + dataId).remove();
                 
            
        },
        error: function( data ) {
            
        }
    });

    return false;
});
    $('.button-remove-prod').on('click', function(e) {
    var dataId = $(this).attr('data-id');
    $('.did').text($(this).data('id'));

    $.ajax({
        url: '{{ url('dashboard/product') }}' + '/' + dataId,
        type: 'DELETE',
        data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text(),
            },
        success: function( data ) {
                $('.item-' + dataId).remove();
                 
            
        },
        error: function( data ) {
            
        }
    });

    return false;
});



    function sortTable(f,n){
    var rows = $('#datatable-buttons tbody  tr').get();

    rows.sort(function(a, b) {

        var A = getVal(a);
        var B = getVal(b);

        if(A < B) {
            return -1*f;
        }
        if(A > B) {
            return 1*f;
        }
        return 0;
    });

    function getVal(elm){
        var v = $(elm).children('td').eq(n).text().toUpperCase();
        if($.isNumeric(v)){
            v = parseInt(v,10);
        }
        return v;
    }

    $.each(rows, function(index, row) {
        $('#datatable-buttons').children('tbody').append(row);
    });
}
var f_name = 1;
var f_amount = 1;
var f_price = 1;
var f_cat = 1;
var f_create = 1;
$("#name").click(function(){
    f_name *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_name,n);
});
$("#amount").click(function(){
    f_amount *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_amount,n);
});

$("#price").click(function(){
    f_price *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_price,n);
});
$("#cat").click(function(){
    f_cat *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_cat,n);
});
$("#create").click(function(){
    f_cat *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_create,n);
});
});
</script>