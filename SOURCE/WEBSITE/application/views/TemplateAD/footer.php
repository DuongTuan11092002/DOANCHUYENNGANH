<!-- footer  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('.xulydonhang').change(function(){
        const value = $(this).val();
        const orderCode = $(this).find(':selected').attr('id');
        if(value==0){
            alert('Vui lòng chọn tình trạng xử lý');
        }else{
            $.ajax({
                method: 'POST',
                url: "/Order/process",
                data:{value:value,orderCode:orderCode},
                success:function(){
                  alert('Thay đổi tình trạng đơn hàng thành công');
                }
            })
        }
    })
</script>

</body>
</html>