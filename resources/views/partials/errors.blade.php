@if ($errors->any())
    <section class="bg-red-600 text-white mb-4 p-4 rounded">
        <h2>Please fix the following errors.</h2>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif
