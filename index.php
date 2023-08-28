<?php 
	// Require Models
	require('models/database.php');
	require('models/admin.php');
	require('models/student.php');
	require('models/teacher.php');
	require('models/course.php');
	require('models/department.php');
	require('models/faculty.php');
	require('models/option.php');

	// Decleare Action
	if (isset($_POST['action'])) {
		$action = htmlspecialchars($_POST['action']);
	}elseif (isset($_GET['action'])) {
		$action = htmlspecialchars($_GET['action']);
	}else{
		$action ="home";
	}
	

	switch ($action) {
		case 'admins':
			$data = [
				'count' => 1,
				'admins' => selectAllAdmins($connection)
			];
			require('views/admins/admins.php');
			break;
		case 'create-admin':
			require('views/admins/create.php');
			break;
		case 'create_admin':
			$data = [
				'name' => htmlspecialchars($_POST['name']),
				'username' => htmlspecialchars($_POST['username']),
				'email' => htmlspecialchars($_POST['email']),
				'gender' => htmlspecialchars($_POST['gender']),
				'dob' => htmlspecialchars($_POST['dob']),
				'phone' => htmlspecialchars($_POST['phone']),
				'image_name' => htmlspecialchars($_FILES['image']['name']),
				'image_temp' => htmlspecialchars($_FILES['image']['tmp_name']),
				'password' => password_hash('password', PASSWORD_DEFAULT),
			];

			// if (validateData($data, $connection, 'create-admin')){
				createAdmin($data, $connection);
			// }
			break;
		case 'edit-admin':
			$id = htmlspecialchars($_GET['admin_id']);
			$data = [
				'admin' => findAdminById($id, $connection)
			];
			require('views/admins/edit.php');
			break;
		case 'update_admin':
			$data = [
				'id' => htmlspecialchars($_POST['admin_id']),
				'name' => htmlspecialchars($_POST['name']),
				'username' => htmlspecialchars($_POST['username']),
				'email' => htmlspecialchars($_POST['email']),
				'gender' => htmlspecialchars($_POST['gender']),
				'dob' => htmlspecialchars($_POST['dob']),
				'phone' => htmlspecialchars($_POST['phone']),
				'image_name' => htmlspecialchars($_FILES['image']['name']),
				'image_temp' => htmlspecialchars($_FILES['image']['tmp_name']),
				'password' => password_hash('password', PASSWORD_DEFAULT),
			];
			updateAdmin($data, $connection);
			break;
		case 'delete_admin':
			$id = htmlspecialchars($_POST['admin_id']);
			deleteAdmin($id, $connection);
			break;
		//Authentication
		case 'login':
			$data = [
				'email' => htmlspecialchars($_POST['email']),
				'password' => htmlspecialchars($_POST['password'])
			];

			if (validateData($data, $connection, 'signin') && login($data, $connection)) {
				header("Location: .?action=home");
			}else{
				echo "<script>alert('Email / Password Incorrect!')</script>";
				echo "<script>window.location='.?action=signin'</script>";
			}
			break;

		case 'logout':
			logout();
			break;

		case 'signin':
			require('views/login.php');
			break;

		// Student Control
		case 'students':
			$data = [
				'count' => 1,
				'students' => selectAllStudents($connection)
			];
			require('views/students/students.php');
			break;		

		case 'add_student':
			$data = [
				'matric_no' => "SMS" . rand(1000000, 9999999),
				'first_name' => htmlspecialchars($_POST['first-name']),
				'last_name' => htmlspecialchars($_POST['last-name']),
				'gender' => htmlspecialchars($_POST['gender']),
				'dob' => htmlspecialchars($_POST['dob']),
				'phone' => htmlspecialchars($_POST['phone']),
				'email' => htmlspecialchars($_POST['email']),
				'faculty_id' => htmlspecialchars($_POST['faculty']),
				'department_id' => htmlspecialchars($_POST['department']),
				'option_id' => htmlspecialchars($_POST['option']),
				'image_name' => htmlspecialchars($_FILES['profile-image']['name']),
				'image_tmp_name' => htmlspecialchars($_FILES['profile-image']['tmp_name'])
			];

			if (validateData($data, $connection, 'add-student')) {
				registerStudent($data, $connection);	
			}
			break;

		case 'add-student':
			$data = [
				'faculties' => selectAllFaculties($connection),
				'departments' => selectAllDepartments($connection),
				'options' => selectAllOptions($connection),
			];
			require('views/students/add-student.php');
			break;

		case 'update_student':
			$data = [
				'matric_no' => htmlspecialchars($_POST['matric-no']),
				'first_name' => htmlspecialchars($_POST['first-name']),
				'last_name' => htmlspecialchars($_POST['last-name']),
				'gender' => htmlspecialchars($_POST['gender']),
				'dob' => htmlspecialchars($_POST['dob']),
				'phone' => htmlspecialchars($_POST['phone']),
				'email' => htmlspecialchars($_POST['email']),
				'faculty_id' => htmlspecialchars($_POST['faculty']),
				'department_id' => htmlspecialchars($_POST['department']),
				'option_id' => htmlspecialchars($_POST['option']),
				'image_name' => htmlspecialchars($_FILES['profile-image']['name']),
				'image_tmp_name' => htmlspecialchars($_FILES['profile-image']['tmp_name'])
			];

			if (validateData($data, $connection, 'edit-student&student_id='. $data['matric_no'])) {
				updateStudent($data, $connection);	
			}
			break;

		case 'edit-student':
			$id = htmlspecialchars($_GET['student_id']);
			$data = [
				'student' => findStudentByMatric($id, $connection),
				'faculties' => selectAllFaculties($connection),
				'departments' => selectAllDepartments($connection),
				'options' => selectAllOptions($connection),
			];
			require('views/students/edit-student.php');
			break;

		case 'delete_student':
			$id = htmlspecialchars($_POST['student_id']);

			deleteStudent($id, $connection);
			break;
		// End Student Control

		// Teacher Control
		case 'teachers':
			$data = [
				'count' => 1,
				'teachers' => selectAllTeachers($connection)
			];
			require('views/teachers/teachers.php');
			break;
		case 'add-teacher':
			$data = [
				'departments' => selectAllDepartments($connection)
			];
			require('views/teachers/add-teacher.php');
			break;
		case 'add_teacher':
			$data = [
				'name' => htmlspecialchars($_POST['name']),
				'email' => htmlspecialchars($_POST['email']),
				'gender' => htmlspecialchars($_POST['gender']),
				'phone' => htmlspecialchars($_POST['phone']),
				'dept_id' => htmlspecialchars($_POST['dept-id']),
			];

			if (validateData($data, $connection, 'add-teacher')) {
				registerTeacher($data, $connection);	
			}
			break;
		case 'edit-teacher':
			$id = htmlspecialchars($_GET['teacher_id']);
			$data = [
				'teacher' => findTeacherById($id, $connection),
				'departments' => selectAllDepartments($connection)
			];
			require('views/teachers/edit-teacher.php');
			break;
		case 'update_teacher':
			$data = [
				'id' => htmlspecialchars($_POST['teacher_id']),
				'name' => htmlspecialchars($_POST['name']),
				'email' => htmlspecialchars($_POST['email']),
				'gender' => htmlspecialchars($_POST['gender']),
				'phone' => htmlspecialchars($_POST['phone']),
				'departments' => selectAllDepartments($connection),
				'dept_id' => htmlspecialchars($_POST['dept-id']),
			];

			if (validateData($data, $connection, 'teachers')) {
				updateTeacher($data, $connection);	
			}
			break;
		case 'delete_teacher':
			$id = htmlspecialchars($_POST['teacher_id']);

			deleteTeacher($id, $connection);
			break;
		// End Teacher Control

		// Course Control
		case 'courses':
			$data = [
				'count' => 1,
				'courses' => selectAllCourses($connection)
			];
			require('views/courses/courses.php');
			break;
		case 'add-course':
			require('views/courses/add-course.php');
			break;
		case 'add_course':
			$data = [
				'code' => htmlspecialchars($_POST['code']),
				'title' => htmlspecialchars($_POST['title']),
				'unit' => htmlspecialchars($_POST['unit']),
			];

			if (validateData($data, $connection, 'add-course')) {
				registerCourse($data, $connection);	
			}
			break;
		case 'edit-course':
			$id = htmlspecialchars($_GET['course_id']);
			$course = findCourseById($id, $connection);
			require('views/courses/edit-course.php');
			break;
		case 'update_course':
			$data = [
				'id' => htmlspecialchars($_POST['course_id']),
				'code' => htmlspecialchars($_POST['code']),
				'title' => htmlspecialchars($_POST['title']),
				'unit' => htmlspecialchars($_POST['unit']),
			];

			if (validateData($data, $connection, 'courses')) {
				updateCourse($data, $connection);	
			}
			break;
		case 'delete_course':
			$id = htmlspecialchars($_POST['course_id']);

			deleteCourse($id, $connection);
			break;
		// End Student Control

		// Department Control
		case 'departments':
			$data = [
				'count' => 1,
				'departments' => selectAllDepartments($connection)
			];
			require('views/departments/departments.php');
			break;
		case 'add-department':
			require('views/departments/add-department.php');
			break;
		case 'add_department':
			$data = [
				'name' => htmlspecialchars($_POST['name'])
			];

			if (validateData($data, $connection, 'add-department')) {
				registerDepartment($data, $connection);	
			}
			break;
		case 'edit-department':
			$id = htmlspecialchars($_GET['department_id']);
			$department = findDepartmentById($id, $connection);
			require('views/departments/edit-department.php');
			break;
		case 'update_department':
			$data = [
				'id' => htmlspecialchars($_POST['department_id']),
				'name' => htmlspecialchars($_POST['name'])
			];

			if (validateData($data, $connection, 'departments')) {
				updateDepartment($data, $connection);	
			}
			break;
		case 'delete_department':
			$id = htmlspecialchars($_POST['department_id']);

			deleteDepartment($id, $connection);
			break;
		// End Department Control

		// Faculty Control
		case 'faculties':
			$data = [
				'count' => 1,
				'faculties' => selectAllFaculties($connection)
			];
			require('views/faculties/faculties.php');
			break;
		case 'add-faculty':
			require('views/faculties/add-faculty.php');
			break;
		case 'add_faculty':
			$data = [
				'name' => htmlspecialchars($_POST['name'])
			];

			if (validateData($data, $connection, 'add-faculty')) {
				registerFaculty($data, $connection);	
			}
			break;
		case 'edit-faculty':
			$id = htmlspecialchars($_GET['faculty_id']);
			$faculty = findFacultyById($id, $connection);
			require('views/faculties/edit-faculty.php');
			break;
		case 'update_faculty':
			$data = [
				'id' => htmlspecialchars($_POST['faculty_id']),
				'name' => htmlspecialchars($_POST['name'])
			];

			if (validateData($data, $connection, 'faculties')) {
				updateFaculty($data, $connection);	
			}
			break;
		case 'delete_faculty':
			$id = htmlspecialchars($_POST['faculty_id']);

			deleteFaculty($id, $connection);
			break;
		// End Faculty Control

		// Option Control
		case 'options':
			$data = [
				'count' => 1,
				'options' => selectAllOptions($connection)
			];
			require('views/options/options.php');
			break;
		case 'add-option':
			require('views/options/add-option.php');
			break;
		case 'add_option':
			$data = [
				'name' => htmlspecialchars($_POST['name'])
			];

			if (validateData($data, $connection, 'add-option')) {
				registerOption($data, $connection);	
			}
			break;
		case 'edit-option':
			$id = htmlspecialchars($_GET['option_id']);
			$option = findOptionById($id, $connection);
			require('views/options/edit-option.php');
			break;
		case 'update_option':
			$data = [
				'id' => htmlspecialchars($_POST['option_id']),
				'name' => htmlspecialchars($_POST['name'])
			];

			if (validateData($data, $connection, 'options')) {
				updateOption($data, $connection);	
			}
			break;
		case 'delete_option':
			$id = htmlspecialchars($_POST['option_id']);

			deleteOption($id, $connection);
			break;
		// End Option Control

		default:
			$data = [
				'admins' => selectAllAdmins($connection),
				'students' => selectAllStudents($connection),
				'teachers' => selectAllTeachers($connection),
				'courses' => selectAllCourses($connection),
				'departments' => selectAllDepartments($connection),
				'faculties' => selectAllFaculties($connection),
				'options' => selectAllOptions($connection),
			];
			require('views/home.php');
			break;
	}