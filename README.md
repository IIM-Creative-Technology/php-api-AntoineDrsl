# API Laravel - AntoineDrsl

This API is created as part of a student project at IIM.

## Installation

Use Composer to install packages, launch migrations and fill database with fake data :
```bash
composer install
php artisan migrate
php artisan db:seed
```

## Usage

```bash
php artisan serve
```

## Creator
[AntoineDrsl](https://www.github.com/AntoineDrsl)

## Documentation

### Authentication

#### Login

Log to your account and get token access.

__HTTP Request__

POST http://localhost:8000/api/auth/login

__Body parameters__

email - string - User's email  
password - string - User's password

__Return__

```json
{  
    "access_token": string,  
    "token_type": string,
    "expires_in": int
}  
```

***

#### Logout

Logout to your account and invalidate token access.

__HTTP Request__

POST http://localhost:8000/api/auth/logout

__Header__

Authorization - string - Session token preceded by "Bearer "

__Return__

```json
{  
    "message": string
}  
```

***
***

### Students

#### Create student

Create a student

__HTTP Request__

POST http://localhost:8000/api/students

__Header__

Authorization - string - Admin session token preceded by "Bearer "

__Body parameters__

firstname - string - Student's firstname  
lastname - string - Student's lastname  
age - int - Student's age  
entry_year - date(Y) - Student's entry year  
classe_id - int - Student's class  

__Return__

```json
{  
    "id": int,
    "classe_id": int,
    "firstname": string,
    "lastname": string,
    "age": int,
    "entry_year": date(Y),
    "created_at": datetime,
    "updated_at": datetime
}  
```

***

#### Get students

Get all students

__HTTP Request__

GET http://localhost:8000/api/students

__Header__

Authorization - string - Admin session token preceded by "Bearer "

__Return__

```json
[
    {  
        "id": int,
        "classe_id": int,
        "firstname": string,
        "lastname": string,
        "age": int,
        "entry_year": date(Y),
        "created_at": datetime,
        "updated_at": datetime
    }
] 
```

***

#### Get student

Get a student

__HTTP Request__

GET http://localhost:8000/api/students/{id}

__Header__

Authorization - string - Admin session token preceded by "Bearer "

__Request parameters__

id - int - Student's ID to get

__Return__

```json
{  
    "id": int,
    "classe_id": int,
    "firstname": string,
    "lastname": string,
    "age": int,
    "entry_year": date(Y),
    "created_at": datetime,
    "updated_at": datetime
}
```

***

#### Update student

Update a student

__HTTP Request__

PUT http://localhost:8000/api/students/{id}

__Header__

Authorization - string - Admin session token preceded by "Bearer "

__Request parameters__

id - int - Student's ID to update

__Body parameters__

firstname - string - Student's firstname  
lastname - string - Student's lastname  
age - int - Student's age  
entry_year - date(Y) - Student's entry year  
classe_id - int - Student's class  

__Return__

```json
{  
    "id": int,
    "classe_id": int,
    "firstname": string,
    "lastname": string,
    "age": int,
    "entry_year": date(Y),
    "created_at": datetime,
    "updated_at": datetime
}  
```

***

#### Delete student

Delete a student and his marks.

__HTTP Request__

DELETE http://localhost:8000/api/students/{id}

__Header__

Authorization - string - Admin session token preceded by "Bearer "

__Request parameters__

id - int - Student's ID to delete

__Return__

```json
{  
    "id": int,
    "classe_id": int,
    "firstname": string,
    "lastname": string,
    "age": int,
    "entry_year": date(Y),
    "created_at": datetime,
    "updated_at": datetime
}  
```

***

#### Get student's marks

Get a student's marks.

__HTTP Request__

GET http://localhost:8000/api/students/{id}/marks

__Header__

Authorization - string - Admin session token preceded by "Bearer "

__Request parameters__

id - int - Student's ID to get marks

__Return__

```json
[
    {  
        "id": int,
        "student_id": int,
        "subject_id": int,
        "value": float,
        "created_at": datetime,
        "updated_at": datetime
    }  
]
```

***
***

### Classes

#### Schema

```json
{  
    "id": int,
    "name": string,
    "graduation_year": date(Y),
    "created_at": datetime,
    "updated_at": datetime
}  
```

#### Routes

GET http://localhost:8000/api/classes  
GET http://localhost:8000/api/classes/{id}  
GET http://localhost:8000/api/classes/{id}/students  
POST http://localhost:8000/api/classes  
UPDATE http://localhost:8000/api/classes/{id}  

***
***

### Teachers

#### Schema

```json
{  
    "id": int,
    "firstname": string,
    "lastname": string,
    "entry_year": date(Y),
    "created_at": datetime,
    "updated_at": datetime
}  
```

#### Routes

GET http://localhost:8000/api/teachers  
GET http://localhost:8000/api/teachers/{id}  
POST http://localhost:8000/api/teachers  
UPDATE http://localhost:8000/api/teachers/{id}  


***
***

### Subjects

#### Schema

```json
{  
    "id": int,
    "classe_id": int,
    "teacher_id": int,
    "name": string,
    "start": date(Y-m-d),
    "end": date(Y-m-d),
    "created_at": datetime,
    "updated_at": datetime
}  
```

#### Routes

GET http://localhost:8000/api/subjects  
GET http://localhost:8000/api/subjects/{id}  
POST http://localhost:8000/api/subjects  
UPDATE http://localhost:8000/api/subjects/{id}  


***
***

### Marks

#### Schema

```json
{  
    "id": int,
    "student_id": int,
    "subject_id": int,
    "value": float,
    "created_at": datetime,
    "updated_at": datetime
}  
```

#### Routes

POST http://localhost:8000/api/marks