$(document).ready(function(){
					$("#reply_btn").on('click', function(event){
						event.preventDefault();
						var sender_id=document.getElementById('sender_id').value;
						var replier_id=document.getElementById('replier_id').value;
						var ask_id=document.getElementById('ask_id').value;
						var reply_post=document.getElementById("reply_post").value;
						if(reply_post.length<1){
							$("#empty_error").fadeIn();
							
						}else{
							$("#empty_error").fadeOut();
						document.getElementById("loader").style.display="inline-block";
						document.getElementById("reply_btn").style.display="none";
						var dest=new XMLHttpRequest();
						
						var path=sender_id+'&ask_id='+ask_id+'&replier_id='+replier_id+'&reply_post='+reply_post;
						
						dest.open("POST", "post.php?sender_id="+path
							, true);
						dest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						dest.send();
						dest.onreadystatechange = function() {
						if(dest.readyState == 4 && dest.status == 200){
							document.getElementById("loader").style.display="none";
							document.getElementById("reply_btn").style.display="inline-block";
							document.getElementById("response").innerHTML=reply_post;
						}
						}
					}
					});
				});


				
