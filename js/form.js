$(document).ready(function(){
	$(".application-form").submit(function(e){
		e.preventDefault();
		if($(this).find("[name=name]").val().length<1){
			alert("Name can't be empty.");
			return false;
		}
		if($(this).find("[name=name]").val().length>40){
			alert("Name can't be larger than 40 characters.");
			return false;
		}
		if($(this).find("[name=gender]:checked").length<1){
			alert("Please select your gender.");
			return false;			
		}

		if($(this).find("[name=institute]").val().length<1){
			alert("Institute can't be empty.");
			return false;
		}
		
		if(($(this).find("[name=type]").val()=="delegate"||$(this).find("[name=type]").val()=="eb")&&$(this).find("[name=committee]:checked").length<1){
			alert("Please choose your committee preference.");
			return false;
		}
		if($(this).find("[name=type]").val()=="delegate"&&$(this).find("[name=country]").val().length<1){
			alert("Please choose your country preference.");
			return false;
		}
				
		if($(this).find("[name=institute]").val().length>200){
			alert("Institute can't be larger than 200 characters.");
			return false;
		}
		
		if($(this).find("[name=number]").val().length<1){
			alert("Number can't be empty.");
			return false;
		}
		
		if($(this).find("[name=number]").val().length>20){
			alert("Please enter a valid number.");
			return false;
		}
		
		if($(this).find("[name=email]").val().length<1){
			alert("Email can't be empty.");
			return false;
		}
		
		if($(this).find("[name=email]").val().length>50){
			alert("Email can't be larger than 50 characters.");
			return false;
		}
		
		if($(this).find("[name=muncount]").val().length<1){
			alert("No of mun can't be empty. It can be 0.");
			return false;
		}
		
		if($(this).find("[name=exp]").val().length>600){
			alert("Experience can't be larger than 600 characters.");
			return false;
		}

		
		var obj=new Object();
		obj.name=$(this).find("[name=name]").val();
		obj.gender=$(this).find("[name=gender]:checked").val();
		obj.institute=$(this).find("[name=institute]").val();
		obj.email=$(this).find("[name=email]").val();
		obj.number=$(this).find("[name=number]").val();
		obj.muncount=$(this).find("[name=muncount]").val();
		obj.exp=$(this).find("[name=exp]").val();
		obj.type=$(this).find("[name=type]").val();
		if(obj.type=="delegate"){
			obj.country=$(this).find("[name=country]").val();
			obj.double=$(this).find("[name=double]:checked").length<1?0:1;
			obj.committee=$(this).find("[name=committee]:checked").val();
			if(obj.double==1){
				if($(this).find("[name=partner-name]").val().length<1||$(this).find("[name=partner-number]").val().length<1){
					alert("Please enter your partner's name and number.");
					return false;					
				}
				obj.partner_name=$(this).find("[name=partner-name]").val();
				obj.partner_number=$(this).find("[name=partner-number]").val();
			}
		}else if(obj.type=="eb"){
			obj.committee=$(this).find("[name=committee]:checked").val();			
		}
		$.ajax({
			url:"apply.php",
			type:"post",
			data:obj,
			context:$(this),
			dataType:"json",
			success:function(res){
				if(res.success){
					$(this).hide();
					$(".content-left").html("<p>Thanks for applying for BIT MUN 14. Your unique id is : "+res.id+"<br/>Please keep this for future reference.</p>");
				}else{
					alert(res.error);
				}
			}
			
		});
	});
});