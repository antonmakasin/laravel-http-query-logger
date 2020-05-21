<table>
@foreach($fields as $name => $value)
    <tr>
        <td style="padding: 10px; border: #e9e9e9 1px solid;"><p>{{ $name }}</p></td>
        <td><p>{{ $value }}</p></td>
    </tr>
@endforeach
</table>
