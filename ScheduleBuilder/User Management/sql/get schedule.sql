select schedule.time, schedule.room, course_catalog.course_code, course_catalog.course_name, course_catalog.distance, users.f_name, users.l_name from schedule, teachers, course_catalog, users where schedule.teachers_idusers = teachers.idusers and schedule.course_catalog_idcourse_catalog = course_catalog.idcourse_catalog and teachers.idusers = users.idusers