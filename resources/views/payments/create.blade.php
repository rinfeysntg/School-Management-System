@extends('layoutenrollment')

@section('enrollment')

@if($errors->any())
        <div id="error-messages" style="display: none;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

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
                <button type="submit" class="btn">Create Payment</button>
            </div>
        </form>
        <br>
            <div class="button-container" style="float:right;">
                <a href="{{ route('payments.index') }}"><button class="btn">Return</button></a>
            </div>
        
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

    document.addEventListener('DOMContentLoaded', () => {
        const errorMessages = document.getElementById('error-messages');
        if (errorMessages) {
            let messages = '';
            errorMessages.querySelectorAll('p').forEach((error) => {
                messages += error.innerText + '\n'; 
            });
            if (messages) {
                alert(messages); 
            }
        }
    });
    
</script>

@endsection
