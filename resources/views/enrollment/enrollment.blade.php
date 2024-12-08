@extends('layoutenrollment')

@section('enrollment')
<div class="glass">
    <h1 class="heading">Enroll Students</h1>
    <div class="frame">
        <form id="enrollStudentForm" action="{{ route('enroll.store') }}" method="POST" onsubmit="return confirmCreate()">
            @csrf
            <h4>Student: 
            <select class="searchable-dropdown form-control" id="user_id" name="user_id" required>
            </select>
            </h4>
            <br>
            <h4>Status: 
                <select id="dropdown" name="status" required>
                    <option value="Enrolled">Enrolled</option>
                </select>
            </h4>            
            <br>
            <div class="button-container">
                <button type="submit" class="btn" id="enrollButton">Enroll</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('enrollDashboard') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $('#user_id').select2({
            ajax: {
                url: '{{ route("enrollment.searchUsers") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
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
            placeholder: 'Search for a student',
            minimumInputLength: 1
        });
    });

    function confirmCreate() {
        if (confirm('Enroll Student?')) {
            setTimeout(() => {
                alert('Student Enrolled');
            }, 100);
            return true;
        }
        return false;
    }
</script>
@endsection
