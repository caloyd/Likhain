<!-- jQuery -->

<script src="{{asset('users/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->

<script src="{{asset('users/js/jquery-ui.min.js')}}"></script>

<!-- Bootstrap 4 -->

<script src="{{asset('users/js/bootstrap.bundle.min.js')}}"></script>
<!-- daterangepicker -->

<script src="{{asset('users/js/moment.min.js')}}"></script>

<script src="{{asset('users/js/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->

<script src="{{asset('users/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->

<script src="{{asset('users/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->

<script src="{{asset('users/js/adminlte.js')}}"></script>
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>

<!-- <script src="{{asset('js/landing/number_format.js')}}"></script> -->
<script type="text/javascript">

function number_format(number, decimals, decPoint, thousandsSep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  var n = !isFinite(+number) ? 0 : +number
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  var s = ''

  var toFixedFix = function (n, prec) {
    if (('' + n).indexOf('e') === -1) {
      return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
    } else {
      var arr = ('' + n).split('e')
      var sig = ''
      if (+arr[1] + prec > 0) {
        sig = '+'
      }
      return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
    }
  }

  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
  }

  return s.join(dec)
}

$(function(){
	
	$('#logout, #logoutNav').click(function(){
		Swal.fire({
			title: 'Are you sure?',
			text: "You will be logged out after clicking \"OK\"",
			icon: 'info',
			showCancelButton: true,
			cancelButtonColor: '#d33',
		}).then((result) => {
			if (result.value) {
				Swal.fire(
					'Logged out',
					'You are successfully logged out',
					'success'
				).then((isOkay) => {
					$('#logOutSidenav').submit();
				})
			}
		})
	});

	// Sweetalert Toast Message
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-right',
		showConfirmButton: false,
		timer: 2000,
		// onClose: location.reload()
	});

	fetchApplicantData()
	fetchApplicantEducation()
	fetchApplicantSalary()
	fetchApplicantWorkExperience()
	fetchApplicantSkills()

	// APPLICANT PROFILE

	// Basic Information
	$('#applicantDataForm').submit(function(event){
		event.preventDefault()
		var form = $(this)
		$.ajax({
			url: form.attr('action'),
			data: form.serialize(),
			type: 'PUT',
			dataType: 'json',
			success:function(data){
				if(data.errors){
					var err = Object.entries(data.errors)
					err.forEach(element => {
						$('#'+element[0]).addClass('is-invalid')
						var html = '<strong>'+element[1][0]+'</strong>'
						$('span#'+element[0]).html(html)
					});
				}
				if(data.success){
					fetchApplicantData()
					$('div#editBasicInfo').addClass('d-none')
					Toast.fire({
						icon: 'success',
						titleText: data.success,
						timer: 1000,
						onAfterClose: (toast) => {
							location.reload()
						}
					})
				}
			}
		});
	})

	$(document).on('click', '#btnEditInfo', function(){
		$('#divInfo').addClass('d-none')
		$('#editBasicInfo').removeClass('d-none')
	})

	$('#cancelEditData').on('click', function(){
		fetchApplicantData()
		$('input,select').removeClass('is-invalid')
		$('#editBasicInfo').addClass('d-none')
	})

	// Create Education
	$('#educationForm').on('submit', function(event){
		event.preventDefault()
		var form = $(this)
		console.log(form.serialize());
		$.ajax({
				url: form.attr('action'),
				data: form.serialize(),
				type: 'POST',
				dataType: 'json',
				success:function(data){
					if(data.errors){
						var err = Object.entries(data.errors)
						err.forEach(element => {
							console.log(element[0])
							console.log(err)
							$('#'+element[0]).addClass('is-invalid')
							var html = '<strong>'+element[1][0]+'</strong>'
							$('span#'+element[0]).html(html)
						});
					}
					if(data.success){
						fetchApplicantEducation()
						$('#newEducation').addClass('d-none')
						Swal.fire(
							'Saved',
							data.success,
							'success'
						).then((isOkay) => {
							location.reload()
						})
					}
				},error:function(eror){
					console.log(eror)
			}
		});
	})
	// End of Create Education

	// Cancel create of new education
	$('#cancelNewEduc').on('click', function(){
		var form_id = '#educationForm'
		backToViewEducation(form_id)
		$('#newEducation').addClass('d-none')
	})

	// Update Education
	$(document).on('click', '.editEducation', function(){
		var educ_id = $(this).attr('id')
		$('div.shw-education').addClass('d-none')
		$('#btnAddEduc').addClass('d-none')
		$('div[form-id="ed'+educ_id+'"]').removeClass('d-none')

		$('#educationForm'+educ_id).on('submit', function(event){
			event.preventDefault()
			var form = $(this)
			$.ajax({
				url: form.attr('action'),
				data: form.serialize(),
				type: 'PUT',
				dataType: 'json',
				success:function(data){
					if(data.errors){
						var err = Object.entries(data.errors)
						err.forEach(element => {
							$('#'+element[0]).addClass('is-invalid')
							var html = '<strong>'+element[1][0]+'</strong>'
							$('span#'+element[0]).html(html)
						});
					}
					if(data.success){
						fetchApplicantEducation()
						$('div[form-id="ed'+educ_id+'"]').addClass('d-none')
						Toast.fire({
							icon: 'success',
							titleText: data.success,
						})
					}
				}
			});
		});
	});
	// End of Update Education
	
	// Cancel edit of education
	$('.btnCancelEducation').on('click', function(){
			var educ_id = $(this).attr('data-id')
			var form_id = '#educationForm'+educ_id
			backToViewEducation(form_id)
			$('div[form-id="ed'+educ_id+'"]').addClass('d-none')
	})

	// Delete Education
	$(document).on('click', '.removeEducation', function(){
		var educ_id = $(this).attr('id');
		Swal.fire({
			title: 'Are you sure',
			text: "You want to remove this education?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
		}).then((result) => {
		if (result.value) {
			$.ajax({
				url: '{{ URL::to("applicant/remove_education") }}/'+educ_id,
				data: {_token: '{{csrf_token()}}'},
				type: 'DELETE',
				dataType: 'json',
				success:function(response){
					fetchApplicantEducation()
					Swal.fire(
						response.success,
						'Education Successfully Removed',
						'success',
					)
				}
			})
			}
		})
	})
	// End of Delete Education

	// Create Expected Salary
	$('#salaryForm').on('submit', function(event){
		event.preventDefault()
		var form = $(this)
		$.ajax({
			url: form.attr('action'),
			data: form.serialize(),
			type: 'POST',
			dataType: 'json',
			success:function(data){
				if(data.errors){
					var err = Object.entries(data.errors)
					err.forEach(element => {
						$('#'+element[0]).addClass('is-invalid')
						var html = '<strong>'+element[1][0]+'</strong>'
						$('span#'+element[0]).html(html)
					})
				}
				if(data.success){
					fetchApplicantSalary()
					$('#newSalary').addClass('d-none')
					Swal.fire(
						'Saved',
						data.success,
						'success'
					).then((isOkay) => {
						location.reload()
					})
				}
			}
		})
	})
	// End Create Expected Salary

	// Cancel create new of expected salary
	$('#btnCancelSalary').on('click', function(){
		fetchApplicantSalary()
		$('input,select').removeClass('is-invalid')
		$('#educationForm')[0].reset()
		$('#newSalary').addClass('d-none')
	})

	// Update Salary
	$(document).on('click', '#editSalary', function(){
		$('div.shw-salary').addClass('d-none')
		$('div[form-id="newSalari"]').removeClass('d-none')

		$('#editSalaryForm').on('submit', function(event){
			event.preventDefault();
			var form = $(this);
			$.ajax({
				url: form.attr('action'),
				data: form.serialize(),
				type: 'PUT',
				dataType: 'json',
				success:function(data){
					if(data.errors){
						$('#editSalaryAmount').addClass('is-invalid')
						var html = '<strong>'+data.errors.editSalaryAmount+'</strong>'
						$('span#editSalaryAmount').html(html)
					}
					if(data.success){
						fetchApplicantSalary()
						$('div[form-id="newSalari"]').addClass('d-none')
						Toast.fire({
							icon: 'success',
							titleText: data.success,
						})
					}
				}
			})
		})
	})
	// End of Update Salary
		
	// Cancel edit of salary
	$('#cancelSalary').on('click', function(){
		fetchApplicantSalary()
		$('input,select').removeClass('is-invalid')
		$('#editSalaryForm')[0].reset()
		$('div[form-id="newSalari"]').addClass('d-none')
	})

	// Delete Salary
	$(document).on('click', '#removeSalary', function(){
		Swal.fire({
			title: 'Are you sure',
			text: "You want to remove your expected salary?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: '{{ URL("applicant/remove_salary", [Auth::id()]) }}',
					data: {_token: '{{csrf_token()}}'},
					type: 'PUT',
					dataType: 'json',
					success:function(response){
						fetchApplicantSalary()
						Swal.fire(
							response.success,
							'Education Successfully Removed',
							'success',
						)
					}
				})
			}
		})
	})
	// End of delete salary

	// Create Work Experience
	$('#workExpForm').on('submit', function(event){
		event.preventDefault()
		var form = $(this)
		$.ajax({
			url: form.attr('action'),
			data: form.serialize(),
			type: 'POST',
			dataType: 'json',
			success:function(data){
				if(data.errors){
						var err = Object.entries(data.errors)
						err.forEach(element => {
								$('#'+element[0]).addClass('is-invalid')
								var html = '<strong>'+element[1][0]+'</strong>'
								$('span#'+element[0]).html(html)
						})
				}
				if(data.success){
					fetchApplicantWorkExperience()
					$('#newWorkExp').addClass('d-none')
					Swal.fire(
							'Saved',
							data.success,
							'success'
					).then((isOkay) => {
						location.reload()
					})
				}
			}
		})
	})
	// End of Create Work  Experience

	// Cancel create of new work experience
	$('#btnCancelWork').on('click', function(){
		var form_id = '#workExpForm'
		backToViewWorkExperience(form_id)
		$('#newWorkExp').addClass('d-none')
	})

	// Update Work Experience
	$(document).on('click', '.editWorkExp', function(){
		var exp_id = $(this).attr('id')
		$('div.shw-workexp').addClass('d-none')
		$('#btnAddWorkExp').addClass('d-none')
		$('div[form-id="we'+exp_id+'"]').removeClass('d-none')

		$('#workExpForm'+exp_id).on('submit', function(event){
			event.preventDefault()
			var form = $(this)
			$.ajax({
				url: form.attr('action'),
				data: form.serialize(),
				type: 'PUT',
				dataType: 'json',
				success:function(data){
					if(data.errors){
						var err = Object.entries(data.errors)
						err.forEach(element => {
							$('#'+element[0]).addClass('is-invalid')
							var html = '<strong>'+element[1][0]+'</strong>'
							$('span#'+element[0]).html(html)
						})
					}
					if(data.success){
						fetchApplicantWorkExperience()
						$('div[form-id="we'+exp_id+'"]').addClass('d-none')
						Toast.fire({
								icon: 'success',
								titleText: data.success,
						})
					}
				}
			})
		})
	})
	// End of Update Work Experience

	// Cancel edit of work experience
	$('.btnCancelWork').on('click', function(){
		var exp_id = $(this).attr('data-id')
		var form_id = '#workExpForm'+exp_id
		backToViewWorkExperience(form_id)
		$('div[form-id="we'+exp_id+'"]').addClass('d-none')
	})

	// Delete Work Experience
	$(document).on('click', '.removeWorkExp', function(){
			var exp_id = $(this).attr('id')
		Swal.fire({
			title: 'Are you sure',
			text: "You want to remove this work experience?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: '{{ URL::to("applicant/remove_work_experience") }}/'+exp_id,
					data: {_token: '{{csrf_token()}}'},
					type: 'DELETE',
					dataType: 'json',
					success:function(response){
						fetchApplicantWorkExperience()
						Swal.fire(
							response.success,
							'Education Successfully Removed',
							'success',
						)
					}
				})
			}
		})
	})
	// End of delete work experience

		// $(document).on('mouseenter', '#showBasicInfo', function(){
		// 		$('#infoEdit').attr('hidden', false)
		// }).on('mouseleave', '#showBasicInfo', function(){
		// 		$('#infoEdit').attr('hidden', true)
		// })

		// $(document).on('mouseenter', '.educationOnHover', function(){
		// 		var row_id = $(this).attr('row-id')
		// 		$('#educationEdit'+row_id).attr('hidden', false)
		// }).on('mouseleave', '.educationOnHover', function(){
		// 		var row_id = $(this).attr('row-id')
		// 		$('#educationEdit'+row_id).attr('hidden', true)
		// })

		// $(document).on('mouseenter', '#salaryOnHover', function(){
		// 		$('#salaryEdit').attr('hidden', false)
		// }).on('mouseleave', '#salaryOnHover', function(){
		// 		$('#salaryEdit').attr('hidden', true)
		// })

		// $(document).on('mouseenter', '.workexpOnHover', function(){
		// 		var row_id = $(this).attr('row-id')
		// 		$('#workExpEdit'+row_id).attr('hidden', false)
		// }).on('mouseleave', '.workexpOnHover', function(){
		// 		var row_id = $(this).attr('row-id')
		// 		$('#workExpEdit'+row_id).attr('hidden', true)
		// })

		// $(document).on('mouseenter', '#shw-skill', function(){
		// 		$('#skillEdit').attr('hidden', false)
		// }).on('mouseleave', '#shw-skill', function(){
		// 		$('#skillEdit').attr('hidden', true)
		// })
			
		function backToViewEducation(form_id){
				fetchApplicantEducation()
				$('input,select').removeClass('is-invalid')
				$(form_id)[0].reset()
		}

		function backToViewWorkExperience(form_id){
				fetchApplicantWorkExperience()
				$('input,select').removeClass('is-invalid')
				$(form_id)[0].reset()
		}

		function fetchApplicantData(){
				$('div#divInfo').removeClass('d-none')
				$.ajax({
						url: '{{ route("applicant.profile.show", Auth::id()) }}',
						type: 'GET',
						dataType: 'json',
						success:function(data){
							var html = ''
							var mid = data.user_data.middle_name;
							if (mid == null) {
								mid = ''
							}
							
							if (data.applicant_data.avatar_image_path == null)
							{
								html += '<div class="text-center"><img src="{{asset("img/dist/applicant.png")}}" class="img-fluid" alt="USER PHOTO" width="200" height="200"> </div>'
							}

							if (data.applicant_data.avatar_image_path)
							{
								html += '<div class="text-center"><img src="/profile/'+data.applicant_data.avatar_image_path+'" class="img-fluid img-circle" alt="USER PHOTO" width="200" height="200"> </div>'
							}
							
							html += '<h3 class="text-center">'+data.user_data.first_name+' '+mid+' '+data.user_data.last_name+'</h3>'
							if (data.applicant_data.gender) {
								html += '<p class="card-text mb-1 text-capitalize"><i class="fas fa-venus-mars text-success"></i> '+data.applicant_data.gender+'</p>'
							}
							html += '</div><p class="card-text mb-1"><i class="fas fa-envelope mr-2 text-success"></i>{{ Auth::user()->email }}</p>'
							if (data.applicant_data.address) {
								html += '<p class="card-text mb-1"><i class="fas fa-map-marker-alt mr-2 text-success"></i>'+data.applicant_data.address+'</p>'
							}
							if (data.applicant_data.contact_number) {
								html += '<p class="card-text mb-1"><i class="fas fa-phone-alt mr-2 text-success"></i>'+data.applicant_data.contact_number+'</p>'
							}
							if (data.applicant_data.birth_date) {
								html += '<p class="card-text mb-1"><i class="fas fa-birthday-cake mr-2 text-success"></i>'+new Date(data.applicant_data.birth_date).toDateString().replace(/^\S+\s/,'')+'</p>'
							}
							html += '<div class="text-right" id="infoEdit"><button type="button" class="btn btn-sm btn-flat btn-primary rounded ml-1" id="btnEditInfo">Edit</button>'
							$('#showBasicInfo').html(html)
						},error:function(eror){
							console.log(eror)
						}
				})
		}

		function fetchApplicantEducation(){
				$('div.shw-education').removeClass('d-none');
				$('#btnAddEduc').removeClass('d-none');
				$.ajax({
						url: '{{ route("applicant.profile.show", Auth::id()) }}',
						type: 'GET',
						dataType: 'json',
						success:function(data){
								var html = ''
								data.education.forEach(item => {
									let from = new Date(item.date_from).toDateString().substr(3, 5)+' '+new Date(item.date_from).toDateString().substr(10)
									let to = new Date(item.date_to).toDateString().substr(3, 5)+' '+new Date(item.date_to).toDateString().substr(10)
									if (item.description == null) {
										item.description = 'none'
									}
									html += '<div class="row educationOnHover" row-id="'+item.id+'"><div class="col-md-3 mt-2"><p><b>'+item.education_attainment+'</b></p></div><div class="col-md-9 mt-2"><p class="mb-2 font-weight-bolder">'+from+' - '+to+'</p><p class="mb-1">'+item.school+'</p><p class="mb-1">'+item.course_degree+'</p><h6 class="mt-3"><b>Achievements/Descriptions:</b></h6><p>'+item.description+'</p><div class="text-right educationEdit" id="educationEdit'+item.id+'"><button type="button" class="btn btn-sm btn-flat btn-primary rounded editEducation" id="'+item.id+'">Edit</button><button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1 removeEducation" id="'+item.id+'">Remove</button></div></div></div>'
								})
								$('.shw-education').html(html)
						}
				})
		}

		function fetchApplicantSalary(){
				$('div.shw-salary').removeClass('d-none');
				$.ajax({
						url: '{{ route("applicant.profile.show", Auth::id()) }}',
						type: 'GET',
						dataType: 'json',
						success:function(data){
								var salary = data.applicant_data.expected_salary
								var html = ''
								var curr_name = ''
								data.currency.forEach(curr => {
										if (curr.id==data.applicant_data.currency_id) {
											curr_name = curr.name
											return curr_name
										}
								})
								if(salary == 0 || salary == null){
									var newBtnSalary = '<button type="button" class="btn btn-sm btn-flat btn-success float-right" id="btnAddSalary"><i class="fas fa-plus mr-2"></i>Add Expected Salary</button>'
									$('#newSal').html(newBtnSalary)
								}else {
									html += '<div class="row" id="salaryOnHover"><div class="col-md-3 mt-2"><p>'+curr_name+' '+Intl.NumberFormat().format(salary)+' per month</p></div><div class="col-md-9 mt-2"><div class="text-right" id="salaryEdit"><button type="button" class="btn btn-sm btn-flat btn-primary rounded" id="editSalary">Edit</button><button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1" id="removeSalary">Remove</button></div></div></div>'
								}
								$('.shw-salary').html(html)
						}
				})
				// html = '<div class="col-md-4 mt-2"><p>'+curr_name+' '+number_format(data.applicant_data.expected_salary)+' per month</p></div>'
				// $('.shw-salary').append(html);
		}
			
		function fetchApplicantWorkExperience(){
				$('div.shw-workexp').removeClass('d-none')
				$('#btnAddWorkExp').removeClass('d-none')
				$.ajax({
						url: '{{ route("applicant.profile.show", Auth::id()) }}',
						type: 'GET',
						dataType: 'json',
						success:function(data){
								var html = '';
								data.workexp.forEach(item => {
										var curr_name = ''
										data.currency.forEach(curr => {
											if (curr.id==item.currency_id) {
												curr_name = curr.name;
												return curr_name
											}
										})
										if (item.description == null) {
											item.description = 'none'
										}
										html += '<div class="row workexpOnHover" row-id="'+item.id+'"><div class="col-md-3 mt-2"><p><b>'+item.company_name+'</b></p></div><div class="col-md-9 mt-2"><h6><b>'+item.job_title+'</b></h6><p class="mb-1">'+item.date_from+' - '+item.date_to+'</p><p>'+curr_name+' '+Intl.NumberFormat().format(item.previous_salary)+'</p><h6 class="mt-3"><b>Job Description:</b></h6><p>'+item.description+'</p><div class="text-right workExpEdit" id="workExpEdit'+item.id+'"><button type="button" class="btn btn-sm btn-flat btn-primary rounded editWorkExp" id="'+item.id+'">Edit</button><button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1 removeWorkExp" id="'+item.id+'">Remove</button></div></div></div>'
								});
								$('.shw-workexp').html(html);
						}
				})
		}

		function fetchApplicantSkills(){
				$('#shw-skill').removeClass('d-none')
				$.ajax({
						url: '{{ route("applicant.profile.show", Auth::id()) }}',
						type: 'GET',
						dataType: 'json',
						success:function(data){
								var html = ''
								var skill_name = ''
								var skill_exp = ''
								if (data.skills.length === 0) {
										$('#addSkill').removeClass('d-none')
										html += '<button type="button" class="btn btn-sm btn-flat btn-outline-success float-right" id="addSkillBtn"><i class="fas fa-plus mr-2"></i>ADD SKILLS</button>'
										$('#addSkill').html(html)
								}else {
										data.skills.forEach(skill => {
												skill_name += '<p class="font-weight-bolder">'+skill.name+'</p>'
												skill_exp += '<p>'+skill.pivot.years_of_experience+' Years of Experience</p>'
										})
										skill_exp += '<div class="text-right" id="skillEdit"><button type="button" class="btn btn-sm btn-flat btn-primary rounded" id="editSkill">Edit</button></div>'
								}
								$('#skill_name').html(skill_name)
								$('#skill_exp').html(skill_exp)
						}
				})
		}

		function showApplicantSkills(){
				$('#editSkills').removeClass('d-none')
				$('#addSkill').addClass('d-none')
				var years_exp = ['0 - 2', '2 - 3', '3 - 5', '5 - 8', '8 - 10']
				$.ajax({
						url: '{{ route("applicant.profile.show", Auth::id()) }}',
						type: 'GET',
						dataType: 'json',
						success:function(data){
								var html = '';
								data.skills.forEach(skill => {
										html += '<div class="row my-3 showed" id="rms'+skill.id+'"><div class="col-md-3"><label id="sknm'+skill.id+'" skill-id="'+skill.id+'">'+skill.name+'</label></div><div class="col-md-3 w-50"><select id="yearExp'+skill.id+'" class="form-control">'
										for (let i = 0; i < years_exp.length; i++) {
												if (years_exp[i] == skill.pivot.years_of_experience) {
														html += '<option value="'+years_exp[i]+'" selected>'+years_exp[i]+' Years of Experience</option>'
												}else{
														html += '<option value="'+years_exp[i]+'">'+years_exp[i]+' Years of Experience</option>'
												}
										}
										html += '</select></div><div class="col-md-1 mt-1"><button type="button" class="btn btn-sm btn-flat btn-danger removeSkill" data-id="rms'+skill.id+'"><i class="fas fa-times"></i></button></div></div>'
								})
								$('#skill').html(html);
						}
				})
		}

		$(document).on('click', '.removeSkill', function(){
				var id = $(this).attr('data-id')
				$('div#'+id).removeClass('showed')
				$('div#'+id).addClass('d-none')
		})

		$(document).on('click', '.rmSkill', function(){
				var id = $(this).attr('data-id')
				$('div#'+id).removeClass('showed')
				$('div#'+id).addClass('d-none')
		})

		$('#skillForm').on('submit', function(event){
				event.preventDefault()
				var form = $(this)
				var skl = []
				var skl_nm = []
				$('#skill .showed label').each( function(){
						var skill_id = $('#'+this.id).attr('skill-id')
						var exp = $('#yearExp'+skill_id).val()
						var intSkill = parseInt(skill_id)
						skl[intSkill] = {years_of_experience:exp}
				})
				$('#skill .show label').each( function(){
						var skill_id = $('#'+this.id).attr('skill-id')
						var skill_name = $('#'+this.id).text()
						var exp = $('#yearsExp'+skill_id).val()
						skl_nm.push({
							name:skill_name,
							exp_yr:exp
						})
				})
					
				$.ajax({
						url: form.attr('action'),
						data: {
								_token: '{{csrf_token()}}',
								c_hidden_id: 5,
								skills: skl,
								skills_exp: skl_nm,
						},
						type: 'POST',
						dataType: 'json',
						success:function(response){
								if(response.success){
									fetchApplicantSkills()
									$('#editSkills').addClass('d-none')
										Toast.fire({
												icon: 'success',
												titleText: response.success,
										})
								}
						},error:function(eror){
							console.log(eror)
						}
				})
		})

		$(document).on('click', '#addSkillBtn', function(){
				$('#shw-skill').addClass('d-none')
				showApplicantSkills()
		})

		$(document).on('click', '#editSkill', function(){
				$('#shw-skill').addClass('d-none')
				showApplicantSkills()
		})

		$('#cancelEditSkill').on('click', function(){
				fetchApplicantSkills()
				$('#editSkills').addClass('d-none')
		})
	})
</script>