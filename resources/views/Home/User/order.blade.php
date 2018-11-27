<div class="my_nala_centre ilizi_centre"> 
   <div class="ilizi cle"> 
    <div class="box"> 
     <div class="box_1"> 
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;"> 
       <h1>订单状态</h1> 
       <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"> 
        <tbody>
         <tr> 
          <td width="15%" align="right" bgcolor="#ffffff">订单号：</td> 
          <td align="left" bgcolor="#ffffff">{{$info->order_num}} </td> 
         </tr> 
         <tr> 
          <td align="right" bgcolor="#ffffff">订单状态：</td> 
          <td align="left" bgcolor="#ffffff">未确认&nbsp;&nbsp;&nbsp;&nbsp;</td> 
         </tr> 
         <tr> 
          <td align="right" bgcolor="#ffffff">付款状态：</td> 
          <td align="left" bgcolor="#ffffff">未付款&nbsp;&nbsp;&nbsp;&nbsp;</td> 
         </tr> 
         <tr> 
          <td align="right" bgcolor="#ffffff">配送状态：</td> 
          <td align="left" bgcolor="#ffffff">未发货&nbsp;&nbsp;&nbsp;&nbsp;</td> 
         </tr> 
        </tbody>
       </table> 
       <h1>商品列表 </h1> 
       <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"> 
        <tbody>
         <tr> 
          <th width="23%" align="center" bgcolor="#ffffff">商品名称</th> 
          <th width="29%" align="center" bgcolor="#ffffff">属性</th> 
          <!--<th>专柜价</th>--> 
          <th width="26%" align="center" bgcolor="#ffffff">商品价格</th> 
          <th width="9%" align="center" bgcolor="#ffffff">购买数量</th> 
          <th width="20%" align="center" bgcolor="#ffffff">小计</th> 
         </tr>
		@foreach($shops as $row)
         <tr> 
          <td bgcolor="#ffffff"> <a href="/goods/{{$row->id}}" target="_blank" class="f6">{{$row->name}}</a> </td> 
          <td align="left" bgcolor="#ffffff">{{$row->descr}}</td> 
          <!--<td align="right">3598.79<em>元</em></td>--> 
          <td align="right" bgcolor="#ffffff">{{$row->price}}<em>元</em></td> 
          <td align="center" bgcolor="#ffffff">{{$row->num}}</td> 
          <td align="right" bgcolor="#ffffff">{{$row->price*$row->num}}<em>元</em></td> 
         </tr> 
		@endforeach
         <tr> 
          <td colspan="8" bgcolor="#ffffff" align="right"> 商品总价: {{$amount}}<em>元</em> </td> 
         </tr> 
        </tbody>
       </table> 
       <h1>费用总计</h1> 
       <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"> 
        <tbody>
         <tr> 
          <td align="right" bgcolor="#ffffff"> 商品总价: {{$amount}}<em>元</em> + 配送费用: 15.00<em>元</em> </td> 
         </tr> 
         <tr> 
          <td align="right" bgcolor="#ffffff"> </td> 
         </tr> 
         <tr> 
          <td align="right" bgcolor="#ffffff">应付款金额: {{$amount+15.00}}<em>元</em> </td> 
         </tr> 
        </tbody>
       </table> 
        
      </div> 
     </div> 
    </div> 
   </div> 
  </div>   