<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			// var isParaChecked=false;  
			// var hasAttachmentChecked= false ;  
			$('#is_para').attr('checked', 'checked');
			$('#autoUpdate').fadeOut();
			$('#is_para').change(function(){
				if(this.checked){
					$('#autoUpdate').fadeOut('slow');
				}else{
					$('#autoUpdate').fadeIn('slow');}

			});

			// $('#answer_attachment').change(function(){
			// 	if(isParaChecked){
			// 		$('#autoUpdate').fadeOut('slow');
			// 	}else{
			// 		$('#autoUpdate').fadeIn('slow');}

			// });
		});
	</script>
	<script type="text/javascript">
		$(function() {
			$('#add_question_form').on('submit', function(e) {
				var form = $(this);
				var data = new FormData(form);
				var url = form.prop('action');
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: function(response) {
						$('#add_question').modal('hide');
						location.reload(true);
					},
					cache: false,

					error: function() {
						alert('Error');

					}
				});
				return false;
			});
		});


	</script>

	<!--<script type="text/javascript">
		$(function() {
			$('#edit_question_form').on('submit', function(e) {
				var form = $(this);
				var data = new FormData(form);
				var url = form.prop('action');
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: function(response) {
						$('#edit_question').modal('hide');
						$('#name_' + response.id).text(response.title);
						$('#edit_' + response.id).data('name' ,response.title);
						$('#delete_' + response.id).data('name' ,response.title);
						console.log(response);
					},
					error: function() {
						alert('Error');

					}
				});
				return false;
			});
		});
	</script>-->

	<script>
		$(document).ready(function(){
			$('.fa-pencil').on('click' , function (e) {
				$('#id').val($(this).data('id'));
				$('#question-title').val('');
				
			} );
		});
	</script>
	<script type="text/javascript">
		$(document).on('click', '.delete', function (e) {
			$('.did').val($(this).data('id'));
			$('.dname').text("Are you sure you want to delete "+$(this).data('name') + ' Question ?');
			$('#myModal').modal('show');
		});
		$('.modal-footer').on('click', '#yes', function() {
			$('#myModal').modal('hide');
			var id = $('.did').val();
			var url = '{{route('questions.destroy' , ":id")}}';
			url = url.replace(':id', id);
			var token = '{{ csrf_token() }}';
			$.ajax({
				type: 'DELETE',
				url:url,
				data: {
					"id": id,
					"_token": token,
				},
				success: function(data) {
					console.log('success0');
					$('.item' + data).remove();
					var hide = true;

					$('.table td').each(function(){
						var td_content = $(this).text();

						if(td_content!=""){
							hide = false;
						}
					})

					if(hide){

						$('#question_show').hide();
					}
					console.log(data);
				}
			});
		});

		// Yahia
		// this foloing code will allow for checkboxs to behave as radio button
		// so on check box will be selected
		// if we want to behave like that from serve we need to change them to radio button

		// this function to change the value in width & hight when changed on textbox and range
		function updateValue(id,val){
			document.getElementById(id).value=val;
		}

		//this code to preview the image be#fore uplaod
		// id = ImageControl conatn image , rezsie controle (range inputs)
		//
		//$('#autoUpdate').fadeOut('slow');
            var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
            var ImageControle = $("#ImageControle");
            var WidthText = $("#WidthText");
            var WidthRange = $("#WidthRange");
            var HeightText = $("#HeightText");
            var HeightRange =$("#HeightRange");
            var Preview = $('#Preview'); // button
            var previewImage= $('#previewImage'); // div
            var questionImage= $('#questionImage'); //img tag had src attr
            var inptFileQuestion = $('#inptFileQuestion'); // img input for question
            var DefultImagText = $('#DefultImagText');
            var questionImageRemove = $('#questionImageRemove');
            $("#questionImage").attr('width','500px');
            $("#questionImage").css('width','500px');
            $("#questionImage").attr('height','300px');
            $("#questionImage").css('height','300px');
            $( "#previewImage" ).css('width','300px');
            $( "#previewImage" ).css('height','300px');
		    ImageControle.hide('slow');
		//  setImgAttr('display','none');

		Preview.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle.show('slow');
				// setImgAttr('display',null);
				Preview.html('Hide');
				state=2;
			}else{
				ImageControle.hide('slow');
				Preview.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
		});

		$( "#previewImage" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText').value=width;
			document.getElementById('WidthRange').value=width;
			document.getElementById('HeightText').value=height;
			document.getElementById('HeightRange').value=height;
			previewImage.css('width',width);
			previewImage.css('height',height);
			$("#questionImage").attr('width',width);
			$("#questionImage").css('width',width);
			$("#questionImage").attr('height',height);
			$("#questionImage").css('height',height);
            

		}});

		$(WidthRange).change(function(){
			$( "#previewImage" ).css('width',WidthRange.val());
			$( "#questionImage" ).attr('width',WidthRange.val());
			$( "#questionImage" ).css('width',WidthRange.val());

		});
		$(WidthText).change(function(){
			document.getElementById('WidthText').value>850?document.getElementById('WidthText').value=850:document.getElementById('WidthText').value;
			document.getElementById('WidthText').value<0?document.getElementById('WidthText').value=0:document.getElementById('WidthText').value;
			document.getElementById('WidthText').value==""||null?document.getElementById('WidthText').value=0:document.getElementById('WidthText').value;
			$( "#previewImage" ).css('width',WidthText.val());
			$( "#questionImage" ).attr('width',WidthText.val());
			$( "#questionImage" ).css('width',WidthText.val());
		});
		$(HeightRange).change(function(){
			$( "#previewImage" ).css('height',HeightRange.val());
			$( "#questionImage" ).attr('height',HeightRange.val());
			$( "#questionImage" ).css('height',HeightRange.val());

		});
		$(HeightText).change(function(){
			document.getElementById('HeightText').value>850?document.getElementById('HeightText').value=850:document.getElementById('HeightText').value;
			document.getElementById('HeightText').value<0?document.getElementById('HeightText').value=0:document.getElementById('HeightText').value;
			document.getElementById('HeightText').value==""||null?document.getElementById('HeightText').value=0:document.getElementById('HeightText').value;
			$( "#previewImage" ).css('height',HeightText.val());
			$( "#questionImage" ).attr('height',HeightText.val());
			$( "#questionImage" ).css('height',HeightText.val());
		});

		inptFileQuestion.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText.css('display','none');
				questionImage.css('display','block');
				reader.addEventListener('load',function(){
					questionImage.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
		});
		questionImageRemove.on('click',function(){
			// restore defult 
			DefultImagText.css('display','block');
			questionImage.css('display','none');
			questionImage.attr('src',null);
			document.getElementById('WidthText').value=500;
			document.getElementById('WidthRange').value=500;
			document.getElementById('HeightText').value=300;
			document.getElementById('HeightRange').value=300;
			$("#questionImage").attr('width',500);
			$("#questionImage").css('width',500);
			$("#questionImage").attr('height',300);
			$("#questionImage").css('height',300);
			previewImage.attr('width',500);
			previewImage.css('width',500);
			previewImage.attr('height',300);
			previewImage.css('height',300);
		});

// preview image for edit  question form 
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var	ImageControleEdit = $("#ImageControleEdit");
	var	WidthText0 = $("#WidthText0");
	var	WidthRange0 = $("#WidthRange0");
	var	HeightText0 = $("#HeightText0");
	var	HeightRange0 =$("#HeightRange0");
	var	Preview0 = $('#Preview0'); // button
	var	previewImage0= $('#previewImage0'); // div
	var	questionImage0= $('#questionImage0'); //img tag had src attr
	var	inptFile = $('#inptFile'); // img input for question
	var	DefultImagText0 = $('#DefultImagText0');
	var	questionImageRemove0 = $('#questionImageRemove0');
        $("#questionImage0").attr('width','500px');
        $("#questionImage0").css('width','500px');
        $("#questionImage0").attr('height','300px');
        $("#questionImage0").css('height','300px');
        $( "#previewImage0" ).css('width','300px');
        $( "#previewImage0" ).css('height','300px');
	ImageControleEdit.hide('slow'); 

	Preview0.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControleEdit.show('slow');
				// setImgAttr('display',null);
				Preview0.html('Hide');
				state=2;
			}else{
				ImageControleEdit.hide('slow');
				Preview0.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
		});

		$( "#previewImage0" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText0').value=width;
			document.getElementById('WidthRange0').value=width;
			document.getElementById('HeightText0').value=height;
			document.getElementById('HeightRange0').value=height;
			previewImage0.css('width',width);
			previewImage0.css('height',height);
			$("#questionImage0").attr('width',width);
			$("#questionImage0").css('width',width);
			$("#questionImage0").attr('height',height);
			$("#questionImage0").css('height',height);

		}});

		$(WidthRange0).change(function(){
			$( "#previewImage0" ).css('width',WidthRange0.val());
			$( "#questionImage0" ).attr('width',WidthRange0.val());
			$( "#questionImage0" ).css('width',WidthRange0.val());

		});

		$(WidthText0).change(function(){
			document.getElementById('WidthText0').value>850?document.getElementById('WidthText0').value=850:document.getElementById('HeightText0').value;
			document.getElementById('WidthText0').value<0?document.getElementById('WidthText0').value=0:document.getElementById('HeightText0').value;
			document.getElementById('WidthText0').value==""||null?document.getElementById('WidthText0').value=0:document.getElementById('WidthText0').value;
			$( "#previewImage0" ).css('width',WidthRange0.val());
			$( "#questionImage0" ).attr('width',WidthRange0.val());
			$( "#questionImage0" ).css('width',WidthRange0.val());
		});

		$(HeightRange0).change(function(){
			$( "#previewImage0" ).css('height',HeightRange0.val());
			$( "#questionImage0" ).attr('height',HeightRange0.val());
			$( "#questionImage0" ).css('height',HeightRange0.val());

		});
		$(HeightText0).change(function(){
			document.getElementById('HeightText0').value>850?document.getElementById('HeightText0').value=850:document.getElementById('HeightText0').value;
			document.getElementById('HeightText0').value<0?document.getElementById('HeightText0').value=0:document.getElementById('HeightText0').value;
			document.getElementById('HeightText0').value==""||null?document.getElementById('HeightText0').value=0:document.getElementById('HeightText0').value;
			$( "#previewImage0" ).css('height',HeightText0.val());
			$( "#questionImage0" ).attr('height',HeightText0.val());
			$( "#questionImage0" ).css('height',HeightText0.val());
		});

		inptFile.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText0.css('display','none');
				questionImage0.css('display','block');
				reader.addEventListener('load',function(){
					questionImage0.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
		});
		questionImageRemove0.on('click',function(){
			// restore defult 
			DefultImagText0.css('display','block');
			questionImage0.css('display','none');
			questionImage0.attr('src',null);
			document.getElementById('WidthText0').value=500;
			document.getElementById('WidthRange0').value=500;
			document.getElementById('HeightText0').value=300;
			document.getElementById('HeightRange0').value=300;
			$("#questionImage0").attr('width',500);
			$("#questionImage0").css('width',500);
			$("#questionImage0").attr('height',300);
			$("#questionImage0").css('height',300);
			previewImage0.attr('width',500);
			previewImage0.css('width',500);
			previewImage0.attr('height',300);
			previewImage0.css('height',300);
		});
		 
// preoview choice 1 image 
	var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle1 = $("#ImageControle1");
	var WidthText1 = $("#WidthText1");
	var WidthRange1 = $("#WidthRange1");
	var HeightText1 = $("#HeightText1");
	var HeightRange1 =$("#HeightRange1");
	var Preview1 = $('#Preview1'); // button
	var previewImage1= $('#previewImage1'); // div
	var choice1Image= $('#choice1Image'); //img tag had src attr
	var inptFileChoice1 = $('#inptFileChoice1'); // img input for question
	var DefultImagText1 = $('#DefultImagText1');
	var choice1ImageRemove = $('#choice1ImageRemove');
	ImageControle1.hide('slow');
	$("#choice1Image").attr('width',200);
	$("#choice1Image").css('width',200);
	$("#choice1Image").attr('height',200);
	$("#choice1Image").css('height',200);
	previewImage1.attr('width',200);
	previewImage1.css('width',200);
	previewImage1.attr('height',200);
	previewImage1.css('height',200);

	Preview1.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle1.show('slow');
				// setImgAttr('display',null);
				Preview1.html('Hide');
				state=2;
			}else{
				ImageControle1.hide('slow');
				Preview1.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage1" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText1').value=width;
			document.getElementById('WidthRange1').value=width;
			document.getElementById('HeightText1').value=height;
			document.getElementById('HeightRange1').value=height;
			previewImage1.css('width',width);
			previewImage1.css('height',height);
			$("#choice1Image").attr('width',width);
			$("#choice1Image").css('width',width);
			$("#choice1Image").attr('height',height);
			$("#choice1Image").css('height',height);

	}});

	$(WidthRange1).change(function(){
			$( "#previewImage1" ).css('width',WidthRange1.val());
			$( "#choice1Image" ).attr('width',WidthRange1.val());
			$( "#choice1Image" ).css('width',WidthRange1.val());

		});
	$(WidthText1).change(function(){
		document.getElementById('WidthText1').value>850?document.getElementById('WidthText1').value=850:document.getElementById('WidthText1').value;
		document.getElementById('WidthText1').value<0?document.getElementById('WidthText1').value=0:document.getElementById('WidthText1').value;
		document.getElementById('WidthText1').value==""||null?document.getElementById('WidthText1').value=0:document.getElementById('WidthText1').value;
		$( "#previewImage1" ).css('width',WidthText1.val());
		$( "#choice1Image" ).attr('width',WidthText1.val());
		$( "#choice1Image" ).css('width',WidthText1.val());
	});
	$(HeightRange1).change(function(){
		$( "#previewImage1" ).css('height',HeightRange1.val());
		$( "#choice1Image" ).attr('height',HeightRange1.val());
		$( "#choice1Image" ).css('height',HeightRange1.val());

	});
	$(HeightText1).change(function(){
		document.getElementById('HeightText1').value>850?document.getElementById('HeightText1').value=850:document.getElementById('HeightText1').value;
		document.getElementById('HeightText1').value<0?document.getElementById('HeightText1').value=0:document.getElementById('HeightText1').value;
		document.getElementById('HeightText1').value==""||null?document.getElementById('HeightText1').value=0:document.getElementById('HeightText1').value;
		$( "#previewImage1" ).css('height',HeightText1.val());
		$( "#choice1Image" ).attr('height',HeightText1.val());
		$( "#choice1Image" ).css('height',HeightText1.val());
	});
	inptFileChoice1.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText1.css('display','none');
				choice1Image.css('display','block');
				reader.addEventListener('load',function(){
					choice1Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice1ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText1.css('display','block');
		choice1Image.css('display','none');
		choice1Image.attr('src',null);
		document.getElementById('WidthText1').value=200;
		document.getElementById('WidthRange1').value=200;
		document.getElementById('HeightText1').value=200;
		document.getElementById('HeightRange1').value=200;
		$("#choice1Image").attr('width',200);
		$("#choice1Image").css('width',200);
		$("#choice1Image").attr('height',200);
		$("#choice1Image").css('height',200);
		previewImage1.attr('width',200);
		previewImage1.css('width',200);
		previewImage1.attr('height',200);
		previewImage1.css('height',200);
	});

// preoview choice 2 image 
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle2 = $("#ImageControle2");
	var WidthText2 = $("#WidthText2");
	var WidthRange2 = $("#WidthRange2");
	var HeightText2 = $("#HeightText2");
	var HeightRange2 =$("#HeightRange2");
	var Preview2 = $('#Preview2'); // button
	var previewImage2= $('#previewImage2'); // div
	var choice2Image= $('#choice2Image'); //img tag had src attr
	var inptFileChoice2 = $('#inptFileChoice2'); // img input for question
	var DefultImagText2 = $('#DefultImagText2');
	var choice2ImageRemove = $('#choice2ImageRemove');
	ImageControle2.hide('slow');
	$("#choice2Image").attr('width',200);
	$("#choice2Image").css('width',200);
	$("#choice2Image").attr('height',200);
	$("#choice2Image").css('height',200);
	previewImage2.attr('width',200);
	previewImage2.css('width',200);
	previewImage2.attr('height',200);
	previewImage2.css('height',200);

	Preview2.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle2.show('slow');
				// setImgAttr('display',null);
				Preview2.html('Hide');
				state=2;
			}else{
				ImageControle2.hide('slow');
				Preview2.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage2" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText2').value=width;
			document.getElementById('WidthRange2').value=width;
			document.getElementById('HeightText2').value=height;
			document.getElementById('HeightRange2').value=height;
			previewImage2.css('width',width);
			previewImage2.css('height',height);
			$("#choice2Image").attr('width',width);
			$("#choice2Image").css('width',width);
			$("#choice2Image").attr('height',height);
			$("#choice2Image").css('height',height);

	}});

	$(WidthRange2).change(function(){
			$( "#previewImage2" ).css('width',WidthRange2.val());
			$( "#choice2Image" ).attr('width',WidthRange2.val());
			$( "#choice2Image" ).css('width',WidthRange2.val());

		});
	$(WidthText2).change(function(){
		document.getElementById('WidthText2').value>850?document.getElementById('WidthText2').value=850:document.getElementById('WidthText2').value;
		document.getElementById('WidthText2').value<0?document.getElementById('WidthText2').value=0:document.getElementById('WidthText2').value;
		document.getElementById('WidthText2').value==""||null?document.getElementById('WidthText2').value=0:document.getElementById('WidthText2').value;
		$( "#previewImage2" ).css('width',WidthText2.val());
		$( "#choice2Image" ).attr('width',WidthText2.val());
		$( "#choice2Image" ).css('width',WidthText2.val());
	});
	$(HeightRange2).change(function(){
		$( "#previewImage2" ).css('height',HeightRange2.val());
		$( "#choice2Image" ).attr('height',HeightRange2.val());
		$( "#choice2Image" ).css('height',HeightRange2.val());

	});
	$(HeightText2).change(function(){
		document.getElementById('HeightText2').value>850?document.getElementById('HeightText2').value=850:document.getElementById('HeightText2').value;
		document.getElementById('HeightText2').value<0?document.getElementById('HeightText2').value=0:document.getElementById('HeightText2').value;
		document.getElementById('HeightText2').value==""||null?document.getElementById('HeightText2').value=0:document.getElementById('HeightText2').value;
		$( "#previewImage2" ).css('height',HeightText2.val());
		$( "#choice2Image" ).attr('height',HeightText2.val());
		$( "#choice2Image" ).css('height',HeightText2.val());
	});
	inptFileChoice2.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText2.css('display','none');
				choice2Image.css('display','block');
				reader.addEventListener('load',function(){
					choice2Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice2ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText2.css('display','block');
		choice2Image.css('display','none');
		choice2Image.attr('src',null);
		document.getElementById('WidthText2').value=200;
		document.getElementById('WidthRange2').value=200;
		document.getElementById('HeightText2').value=200;
		document.getElementById('HeightRange2').value=200;
		$("#choice2Image").attr('width',200);
		$("#choice2Image").css('width',200);
		$("#choice2Image").attr('height',200);
		$("#choice2Image").css('height',200);
		previewImage2.attr('width',200);
		previewImage2.css('width',200);
		previewImage2.attr('height',200);
		previewImage2.css('height',200);
	});

//choice 3 image preview 
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle3 = $("#ImageControle3");
	var WidthText3 = $("#WidthText3");
	var WidthRange3 = $("#WidthRange3");
	var HeightText3 = $("#HeightText3");
	var HeightRange3 =$("#HeightRange3");
	var Preview3 = $('#Preview3'); // button
	var previewImage3= $('#previewImage3'); // div
	var choice3Image= $('#choice3Image'); //img tag had src attr
	var inptFileChoice3 = $('#inptFileChoice3'); // img input for question
	var DefultImagText3 = $('#DefultImagText3');
	var choice3ImageRemove = $('#choice3ImageRemove');
	ImageControle3.hide('slow');
	$("#choice3Image").attr('width',200);
	$("#choice3Image").css('width',200);
	$("#choice3Image").attr('height',200);
	$("#choice3Image").css('height',200);
	previewImage3.attr('width',200);
	previewImage3.css('width',200);
	previewImage3.attr('height',200);
	previewImage3.css('height',200);

	Preview3.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle3.show('slow');
				// setImgAttr('display',null);
				Preview3.html('Hide');
				state=2;
			}else{
				ImageControle3.hide('slow');
				Preview3.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage3" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText3').value=width;
			document.getElementById('WidthRange3').value=width;
			document.getElementById('HeightText3').value=height;
			document.getElementById('HeightRange3').value=height;
			previewImage3.css('width',width);
			previewImage3.css('height',height);
			$("#choice3Image").attr('width',width);
			$("#choice3Image").css('width',width);
			$("#choice3Image").attr('height',height);
			$("#choice3Image").css('height',height);

	}});

	$(WidthRange3).change(function(){
			$( "#previewImage3" ).css('width',WidthRange3.val());
			$( "#choice3Image" ).attr('width',WidthRange3.val());
			$( "#choice3Image" ).css('width',WidthRange3.val());

		});
	$(WidthText3).change(function(){
		document.getElementById('WidthText3').value>850?document.getElementById('WidthText3').value=850:document.getElementById('WidthText3').value;
		document.getElementById('WidthText3').value<0?document.getElementById('WidthText3').value=0:document.getElementById('WidthText3').value;
		document.getElementById('WidthText3').value==""||null?document.getElementById('WidthText3').value=0:document.getElementById('WidthText3').value;
		$( "#previewImage3" ).css('width',WidthText3.val());
		$( "#choice3Image" ).attr('width',WidthText3.val());
		$( "#choice3Image" ).css('width',WidthText3.val());
	});
	$(HeightRange3).change(function(){
		$( "#previewImage3" ).css('height',HeightRange3.val());
		$( "#choice3Image" ).attr('height',HeightRange3.val());
		$( "#choice3Image" ).css('height',HeightRange3.val());

	});
	$(HeightText3).change(function(){
		document.getElementById('HeightText3').value>850?document.getElementById('HeightText3').value=850:document.getElementById('HeightText3').value;
		document.getElementById('HeightText3').value<0?document.getElementById('HeightText3').value=0:document.getElementById('HeightText3').value;
		document.getElementById('HeightText3').value==""||null?document.getElementById('HeightText3').value=0:document.getElementById('HeightText3').value;
		$( "#previewImage3" ).css('height',HeightText3.val());
		$( "#choice3Image" ).attr('height',HeightText3.val());
		$( "#choice3Image" ).css('height',HeightText3.val());
	});
	inptFileChoice3.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText3.css('display','none');
				choice3Image.css('display','block');
				reader.addEventListener('load',function(){
					choice3Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice3ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText3.css('display','block');
		choice3Image.css('display','none');
		choice3Image.attr('src',null);
		document.getElementById('WidthText3').value=200;
		document.getElementById('WidthRange3').value=200;
		document.getElementById('HeightText3').value=200;
		document.getElementById('HeightRange3').value=200;
		$("#choice3Image").attr('width',200);
		$("#choice3Image").css('width',200);
		$("#choice3Image").attr('height',200);
		$("#choice3Image").css('height',200);
		previewImage3.attr('width',200);
		previewImage3.css('width',200);
		previewImage3.attr('height',200);
		previewImage3.css('height',200);
	});

// Preview image chice 4
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle4 = $("#ImageControle4");
	var WidthText4 = $("#WidthText4");
	var WidthRange4 = $("#WidthRange4");
	var HeightText4 = $("#HeightText4");
	var HeightRange4 =$("#HeightRange4");
	var Preview4 = $('#Preview4'); // button
	var previewImage4= $('#previewImage4'); // div
	var choice4Image= $('#choice4Image'); //img tag had src attr
	var inptFileChoice4 = $('#inptFileChoice4'); // img input for question
	var DefultImagText4 = $('#DefultImagText4');
	var choice4ImageRemove = $('#choice4ImageRemove');
	ImageControle4.hide('slow');
	$("#choice4Image").attr('width',200);
	$("#choice4Image").css('width',200);
	$("#choice4Image").attr('height',200);
	$("#choice4Image").css('height',200);
	previewImage4.attr('width',200);
	previewImage4.css('width',200);
	previewImage4.attr('height',200);
	previewImage4.css('height',200);

	Preview4.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle4.show('slow');
				// setImgAttr('display',null);
				Preview4.html('Hide');
				state=2;
			}else{
				ImageControle4.hide('slow');
				Preview4.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage4" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText4').value=width;
			document.getElementById('WidthRange4').value=width;
			document.getElementById('HeightText4').value=height;
			document.getElementById('HeightRange4').value=height;
			previewImage4.css('width',width);
			previewImage4.css('height',height);
			$("#choice4Image").attr('width',width);
			$("#choice4Image").css('width',width);
			$("#choice4Image").attr('height',height);
			$("#choice4Image").css('height',height);

	}});

	$(WidthRange4).change(function(){
			$( "#previewImage4" ).css('width',WidthRange4.val());
			$( "#choice4Image" ).attr('width',WidthRange4.val());
			$( "#choice4Image" ).css('width',WidthRange4.val());

		});
	$(WidthText4).change(function(){
		document.getElementById('WidthText4').value>850?document.getElementById('WidthText4').value=850:document.getElementById('WidthText4').value;
		document.getElementById('WidthText4').value<0?document.getElementById('WidthText4').value=0:document.getElementById('WidthText4').value;
		document.getElementById('WidthText4').value==""||null?document.getElementById('WidthText4').value=0:document.getElementById('WidthText4').value;
		$( "#previewImage4" ).css('width',WidthText4.val());
		$( "#choice4Image" ).attr('width',WidthText4.val());
		$( "#choice4Image" ).css('width',WidthText4.val());
	});
	$(HeightRange4).change(function(){
		$( "#previewImage4" ).css('height',HeightRange4.val());
		$( "#choice4Image" ).attr('height',HeightRange4.val());
		$( "#choice4Image" ).css('height',HeightRange4.val());

	});
	$(HeightText4).change(function(){
		document.getElementById('HeightText4').value>850?document.getElementById('HeightText4').value=850:document.getElementById('HeightText4').value;
		document.getElementById('HeightText4').value<0?document.getElementById('HeightText4').value=0:document.getElementById('HeightText4').value;
		document.getElementById('HeightText4').value==""||null?document.getElementById('HeightText4').value=0:document.getElementById('HeightText4').value;
		$( "#previewImage4" ).css('height',HeightText4.val());
		$( "#choice4Image" ).attr('height',HeightText4.val());
		$( "#choice4Image" ).css('height',HeightText4.val());
	});
	inptFileChoice4.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText4.css('display','none');
				choice4Image.css('display','block');
				reader.addEventListener('load',function(){
					choice4Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice4ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText4.css('display','block');
		choice4Image.css('display','none');
		choice4Image.attr('src',null);
		document.getElementById('WidthText4').value=200;
		document.getElementById('WidthRange4').value=200;
		document.getElementById('HeightText4').value=200;
		document.getElementById('HeightRange4').value=200;
		$("#choice4Image").attr('width',200);
		$("#choice4Image").css('width',200);
		$("#choice4Image").attr('height',200);
		$("#choice4Image").css('height',200);
		previewImage4.attr('width',200);
		previewImage4.css('width',200);
		previewImage4.attr('height',200);
		previewImage4.css('height',200);
	});
</script>
<script>
		$(".chb").change(function(){
			$(".chb").prop('checked',false);
			$(this).prop('checked',true);
		});
</script>