<p>MATERIAL</p>
<table>
    @foreach($data['items'] as $item)
        <tr>
            <td>{{ $item['label'] }}</td>
            <td>{{ $item['number'] }}</td>
        </tr>
    @endforeach
    <tr>

    </tr>
</table>

