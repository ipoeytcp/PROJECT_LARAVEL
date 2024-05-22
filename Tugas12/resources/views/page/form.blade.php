@extends('layout.master')

@section('judul')
Form Register
@endsection

@section('content')
<h3>Sign Up Form</h3>
<form action="/welcome" method="post">
    @csrf
    <!-- element input firstname -->
    <label>Firstname :</label><br><br>
    <input type="text" name="firstName"><br><br>

    <!-- element input lastname -->
    <label>Lastname :</label><br><br>
    <input type="text" name="lastName"><br><br>

    <!-- element input radio button gender -->
    <label>Gender :</label><br><br>
    <input type="radio" name="Gender">Male<br>
    <input type="radio" name="Gender">Female<br>
    <input type="radio" name="Gender">Other<br>

    <!-- element input dropdown list natonalaity -->
    <label>Nationality :</label><br><br>
    <select name="Nationality">
        <option value="">Indonesian</option>
        <option value="">Arabic</option>
        <option value="">Chinnese</option>
    </select><br><br>

    <!-- element input checklist language spoken -->
    <label>Language Spoken :</label><br><br>
    <input type="checkbox" name="Language Spoken">Bahasa Indonesian <br>
    <input type="checkbox" name="Language Spoken">English <br>
    <input type="checkbox" name="Language Spoken">Other <br> <br>

    <!-- element input Text Area Bio -->
    <label>Bio :</label><br><br>
    <textarea cols="30" rows="10"></textarea><br><br>

    <input type="submit" value="Kirim">
</form>

@endsection

