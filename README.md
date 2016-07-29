# CRUDZF
#Links  que realizan el CRUD como api


CRUD from webservice examples
http://crudpf.app/wsservices/execute/index/format/json?method=addEmpleado&data[nombre]=Mario&data[apellidos]=Martinez&data[f_nacimiento]=02-12-1983&data[ingresos]=31500

http://crudpf.app/wsservices/execute/index/format/json?method=editEmpleado&data[nombre]=Rosa&data[apellidos]=Martinez&data[f_nacimiento]=02-12-1983&data[ingresos]=31500&data[id_empleado]=8

http://crudpf.app/wsservices/execute/index/format/json?method=getEmpleado&data[id_empleado]=7

http://crudpf.app/wsservices/execute/index/format/json?method=deleteEmpleado&data[id_empleado]=7

http://crudpf.app/wsservices/execute/index/format/json?method=getAllEmpleados

#Formulario de acceso

Lamentablemente me falto terminar la edicion y el alta por via ajax, ya que me enfoque en realizar primero la api, para 
que esta parte de los formularios fuera como un cliente que consumiera a la api, perdi mucho tiempo alzando mi ambiente, ya que no tenia configurado mi nginx. 

http://crudpf.app/empleados/#