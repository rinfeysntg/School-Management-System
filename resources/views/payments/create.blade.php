@extends('layoutenrollment')

@section('enrollment')
<div class="glass">
    <h1 class="heading">Payments</h1>
    <div class="frame">
        <form id="enrollStudentForm" action="{{ route('payments.store') }}" method="POST">
            @csrf
            <h4>Purpose: 
                <input type="text" class="form-control" id="purpose" name="purpose" required>
            </h4>
            <br>
            <h4>Amount: ₱ 
                <input type="number" class="form-control" id="amount" name="amount" required>
            </h4>    
            <br>
            <h4>User: 
                <select class="searchable-dropdown form-control" id="user_id" name="user_id" required>
            </select>
            </h4>         
            <br>
            <div class="button-container">
                <button type="submit" class="btn">Create</button>
            </div>
        </form>
        <br>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#user_id').select2({
            ajax: {
                url: '{{ route("payments.searchUsers") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term, // Search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return { id: item.id, text: item.name };
                        })
                    };
                },
            },
            placeholder: 'Search for a user',
            minimumInputLength: 1
        });
    });
</script>

@endsection
