<div class="row">
    <h2>What Platform do you Specialize in?</h2>
</div>
<script>
    window.onload = function () {
        document.getElementById('platform').click();
    }
</script>
<div class="form-group row">
    <div class="card card-select" id="Android-cardSelect" name="platformCards" style="width: 18rem;" data-value="Android"
         onclick="selectPlatform('Android')">
        <img class="card-img-top" src="{{asset('assets/images/dreamer.png')}}"
             alt="Android">
        <div class="card-body">
            <h5 class="card-title">Android</h5>
        </div>
    </div>
    <div class="card card-select" id="iOS-cardSelect" name="platformCards" style="width: 18rem;" data-value="iOS"
         onclick="selectPlatform('iOS')">
        <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
             alt="iOS image">
        <div class="card-body">
            <h5 class="card-title">iOS</h5>
        </div>
    </div>
    <div class="card card-select" id="Web-cardSelect" name="platformCards" style="width: 18rem;" data-value="Web"
         onclick="selectPlatform('Web')">
        <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
             alt="Web image">
        <div class="card-body">
            <h5 class="card-title">Web</h5>
        </div>
    </div>
    <input type="hidden" id="platform" name="platform" value="" onclick="selectPlatform('{{$user->platform}}')">
</div>
