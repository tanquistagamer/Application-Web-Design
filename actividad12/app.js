Vue.component('chuck-card', {
    props: ['iconUrl', 'value'],
    template: `
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img :src="iconUrl" class="card-img-top" alt="Chuck Norris Icon">
          <div class="card-body">
            <p class="card-text">{{ value }}</p>
          </div>
        </div>
      </div>
    `,
  });
  
  new Vue({
    el: '#app',
    data: {
      chuck: [
        { icon_url: "https://res.cloudinary.com/momentum-media-group-pty-ltd/image/upload/c_fill,q_auto:best,f_auto,e_unsharp_mask:80,w_830,h_478/Space%20Connect%2Fspace-exploration-sc_fm1ysf", value: "Chuck Norris can skydive into outer space." },
        { icon_url: "https://img.freepik.com/vector-gratis/golpe-puno-puno-estilo-pop-art_1284-47594.jpg", value: "The chief export of Chuck Norris is pain." },
        { icon_url: "https://www.telegram.com/gcdn/authoring/2020/02/27/NTEG/ghows-WT-9f905f54-e248-6dc3-e053-0100007f9a9c-571adb6a.jpeg?width=660&height=440&fit=crop&format=pjpg&auto=webp", value: "Chuck Norris doesn't read books. He stares them down until he gets the information he wants." },
        { icon_url: "https://thumbs.dreamstime.com/b/tiempo-y-espacio-6229895.jpg", value: "Time waits for no man. Unless that man is Chuck Norris." },
        { icon_url: "https://www.rgsgroup.co.za/wp-content/uploads/2022/10/5171Scramble-complete-3a2-copy.jpg", value: "If you spell Chuck Norris in Scrabble, you win. Forever." },
      ],
    },
  });  