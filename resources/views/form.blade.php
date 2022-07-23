<form action="{{route('signup.signup')}}" method="post">
    @csrf
    <label for="email" >Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="please enter your email" value="{{old('email')}}">
    <label for="pwd" >Password</label>
    <input type="password" name="pwd" id="pwd" class="form-control " >
    <label for="name" >Name</label>
    <input type="text" name="name" id="name" class="form-control " placeholder="Please enter your name" value="{{old('name')}}">
    <label for="address" >Address</label>
    <input type="text" name="address" id="address" class="form-control " value="{{old('address')}}" >
    <label for="phone" >Phone Number</label>
    <input type="number" name="phone" id="phone" class="form-control " value="{{old('phone')}}">
    <button type="submit" class="btn btn-outline-primary mt-2 ml-3">Signup</button>
</form>
