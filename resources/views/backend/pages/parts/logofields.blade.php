<div class="row my-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Logo</label>
            @if (isset($data) && !empty($data) && isset($data['logo']) && !empty($data['logo']))
                <img src="{{ getImageUrl($data['logo'], 'images') }}" alt="Logo"
                    width="150">
                <br />
            @endif
            <input type="file" name="logo" class="form-conrol">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Bəyaz Logo</label>
            @if (isset($data) && !empty($data) && isset($data['logo_white']) && !empty($data['logo_white']))
                <img src="{{ getImageUrl($data['logo_white'], 'images') }}" alt="Logo_white"
                    width="150" class="bg-danger">
                <br />
            @endif
            <input type="file" name="logo_white" class="form-conrol">
        </div>
    </div>
</div>