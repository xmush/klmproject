<!DOCTYPE html>
<html>
<head>
<style>
.wrapper {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
  grid-auto-rows: minmax(100px, auto);
}
</style>
</head>
<body>
    <table width="213">
        <tr>
          <td width="97" rowspan="2"><img src="{{public_path($fish->fish_picture)}}" width="113" /></td>
          <td width="43" height="32"><div align="center"><strong>1222</strong></div></td>
          <td width="57"><div align="center"><strong>32323</strong></div></td>
        </tr>
        <tr>
          <td height="21" colspan="2"><p align="center">NISEKOI</p>
            <p align="center">DEANG ARIF PANAKUKANG  </p>
          <p align="center"><img src="{{public_path($fish->fish_picture_thumb)}}" width="87" height="87" /></p></td>
        </tr>
      </table>
</body>
</html>