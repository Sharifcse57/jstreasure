<script>
	function subcategory(selector){
			var category_id=$('#'+selector).val();
			$.ajax({
				url: "{{ route('ajax.getSubCat') }}",
				method: 'POST',
				data: { catId: category_id, _token: Laravel.csrfToken},
				dataType: "json",
				success: function (data) {
					if(data.length){
						var x;
						$.each(data, function( index, item ) {
						 	x +='<option id="show" value="'+item.id+'">'+item.title+'</option>';
						});

						$('#sub_category_id').html(x);

					}

				}
		});
	}
</script>