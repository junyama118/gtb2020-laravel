<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>おごる金額を入力</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/mobile_soukin_input.css')}}">

    <body>
        <div class="iphoneX">
            <div class="header">
                <h2>おごる金額を入力してね</h2>
                <button id="back_btn" type="button" onclick="location.href='./users'">
                    ＜
                </button>
            </div>

            <div class="user">
                <div id="icon"></div>
                <div id="username">
                    {{$name}}
                </div>
            </div>

            <div class="number_input">
                <div id="amount">0</div>
                <div id="yen">円</div>

                <div class="input">
                    <section class="row">
                        <div id="clear">AC</div>
                        <div class="num_btn" id="tax">消費税</div>
                        <div class="num_btn"></div>
                    </section>
                    <section class="row">
                        <div class="num_btn" data-index-id= 1>1</div>
                        <div class="num_btn" data-index-id= 2>2</div>
                        <div class="num_btn" data-index-id= 3>3</div>
                    </section>
                    <section class="row">
                        <div class="num_btn" data-index-id= 4>4</div>
                        <div class="num_btn" data-index-id= 5>5</div>
                        <div class="num_btn" data-index-id= 6>6</div>
                    </section>
                    <section class="row">
                        <div class="num_btn" data-index-id= 7>7</div>
                        <div class="num_btn" data-index-id= 8>8</div>
                        <div class="num_btn" data-index-id= 9>9</div>
                    </section>
                    <section class="row">
                        <div class="num_btn" id="zerozero" data-index-id= 00>00</div>
                        <div class="num_btn" id="zero" data-index-id= 0>0</div>
                        <div class="num_btn"></div>
                    </section>
                </div>
            </div>
            
            <form action="/transfer_comment" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="amount" id="total" value=0>
                <input type="hidden" name="id" value="{{$id}}">
                <input type="image" src="/img/next.png"  id="next_btn" type="button" onclick="">
            </form>
        </div>
        
        <script>
            'use strict'
            {
                const num_btn = document.querySelectorAll('.num_btn');
                let total = 0;
                num_btn.forEach(index =>{
                    index.addEventListener('click',() => {
                        console.log(index.dataset.indexId)
                        if(total == 0){
                            total = index.dataset.indexId;
                        }else{
                            //２つ目の数字ボタンを入力した時に１つ目の隣に表示させる
                            total +=  index.dataset.indexId
                        }
                        //数字ボタンに対応した数字を表示される
                        amount.textContent = total;
                        document.getElementById("total").value = total ;
                    })
                })
                
            const clear = document.getElementById('clear')
            clear.addEventListener('click', () => {
                reset();
            })

            function reset(){
                total = 0;
                amount.textContent = 0;
            }

            const next_btn = document.getElementById("next_btn")
            next_btn.addEventListener('click', () =>{
                total = document.amount.submit();
                console.log(total);
            })
        }

        </script>
    </body>
</html>