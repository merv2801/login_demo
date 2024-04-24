<form action="{{ url('logindetails') }}" method="post">
    @csrf
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <br>
    <button type="submit">Submit</button>
</form>