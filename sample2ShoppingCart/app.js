let arr = [{"img":"t1.jpg", "name":"toy name 1", "price":1000},
        {"img":"t2.jpg", "name":"toy name 2", "price":2000},
        {"img":"t3.jpg", "name":"toy name 3", "price":3000},
        {"img":"t4.jpg", "name":"toy name 4", "price":4000},
        {"img":"t5.jpg", "name":"toy name 5", "price":1500},
        {"img":"t6.jpg", "name":"toy name 6", "price":2500},
        {"img":"t7.jpg", "name":"toy name 7", "price":2000},
        {"img":"t8.jpg", "name":"toy name 8", "price":3000},
        {"img":"t9.jpg", "name":"toy name 9", "price":4500},
        {"img":"t10.jpg", "name":"toy name 10", "price":5000},
        {"img":"t11.jpg", "name":"toy name 11", "price":3000},
        {"img":"t12.jpg", "name":"toy name 12", "price":4000},
        {"img":"t13.jpg", "name":"toy name 13", "price":3500},
        {"img":"t14.jpg", "name":"toy name 14", "price":4000},
        {"img":"t15.jpg", "name":"toy name 15", "price":2500},
        {"img":"t16.jpg", "name":"toy name 16", "price":3000},
        {"img":"t17.jpg", "name":"toy name 17", "price":3600},
        {"img":"t18.jpg", "name":"toy name 18", "price":2800},
        {"img":"t19.jpg", "name":"toy name 19", "price":2000},
        {"img":"t20.jpg", "name":"toy name 20", "price":3000}
    ];

    let toys = arr;

    let show=()=> {
        for(i=0;i<toys.length;i++) {
            let d = document.createElement("div");
            d.classList.add("fooddiv");

            let image = document.createElement("img");
            image.src = "../images/"+toys[i].img;

            let h2 = document.createElement("h2");
            h2.innerHTML = toys[i].name;

            let p = document.createElement("p");
            p.innerHTML=toys[i].price;

            d.appendChild(image);
            d.appendChild(h2);
            d.appendChild(p);

            foodContainer.appendChild(d);
        }
    }

    let filterToy=(e)=> {
        let txt = e.value;
        toys = arr.filter((item,index,array)=> {
            if(item.name.includes(txt) || item.price==txt) {
                return true;
            }
        });

        foodContainer.innerHTML = "";
        show();
    }