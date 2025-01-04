import{A as M}from"./ApplicationLogo-B1oXeGrB.js";import{K as S,d as h,C as R,i,D as B,J as _,u as g,k as b,r as w,w as z,e as p,g as e,f as o,t as j,y as A,l as k,s as O,o as U,c as N,p as P,h as D,Y as m,q as C}from"./app-D7Jmbt7w.js";import{_ as L}from"./Modal-CwnzlqXT.js";import{_ as E}from"./Dropdown-BtlqRfQV.js";import H from"./Login-8ZYh5sSb.js";import I from"./Register-BnNZ3Nu6.js";import{_ as W}from"./_plugin-vue_export-helper-DlAUqK2U.js";const d={__name:"NavLink",props:{href:{type:String,required:!0},active:{type:Boolean},isWhite:{type:Boolean}},setup(u){const r=u,t=S(()=>r.active?"text-offset-500 hover:text-offset-700":r.isWhite?"text-black hover:text-black":"text-white hover:text-offset-500");return(f,v)=>(h(),R(g(b),{href:u.href,class:_(t.value)},{default:i(()=>[B(f.$slots,"default")]),_:3},8,["href","class"]))}},V={class:"flex justify-between items-center px-4 py-3 md:px-10 lg:px-20"},Y=e("span",{class:"text-black-500"},"Home",-1),q=e("span",{class:"text-black-500"},"About Us",-1),F=e("span",{class:"text-black-500"},"Products",-1),J=e("span",{class:"text-black-500"},"Services",-1),K=e("span",{class:"text-black-500"},"Blog",-1),Q=e("span",{class:"text-black-500"},"Contact Us",-1),T={key:0,class:"flex flex-col items-start space-y-1"},G=e("span",{class:"text-main-500"},"Account",-1),X={key:1,class:"flex flex-col items-start space-y-1"},Z={__name:"Hamburger",props:{isWhite:{type:Boolean,default:!1},isAuthenticated:{type:Boolean,default:!1}},emits:["update:isWhite","update:is-hamburger-open","show-login-modal","show-register-modal"],setup(u,{emit:r}){const t=w(!1),f=u,v=r,c=w(f.isWhite);z(()=>f.isWhite,s=>{c.value=s});const y=()=>{t.value=!t.value,c.value,v("update:is-hamburger-open",t.value)},x=()=>{v("show-login-modal")},$=()=>{v("show-register-modal")};return(s,a)=>(h(),p("nav",null,[e("div",V,[o(d,{href:s.route("welcome")},{default:i(()=>[o(M,{isDark:c.value},null,8,["isDark"])]),_:1},8,["href"]),e("button",{onClick:y,class:"flex flex-col space-y-1 w-6 h-6 md:hidden z-50"},[e("span",{class:_(["block w-full h-1 rounded transition-transform duration-300",{"bg-black-500":c.value,"bg-white":!c.value,"rotate-45 translate-y-2":t.value}])},null,2),e("span",{class:_(["block w-full h-1 rounded transition-opacity duration-300",{"bg-black-500":c.value,"bg-white":!c.value,"opacity-0":t.value}])},null,2),e("span",{class:_(["block w-full h-1 rounded transition-transform duration-300",{"bg-black-500":c.value,"bg-white":!c.value,"-rotate-45 -translate-y-2":t.value}])},null,2)])]),j(e("ul",{class:_([{"opacity-100 translate-y-0":t.value,"opacity-0 -translate-y-4":!t.value},"md:hidden text-black-500 space-y-2 px-4 py-2 transform transition-all duration-300"])},[e("li",null,[o(d,{href:s.route("welcome"),active:s.route().current("welcome")},{default:i(()=>[Y]),_:1},8,["href","active"])]),e("li",null,[o(d,{href:s.route("about.index"),active:s.route().current("about.index")},{default:i(()=>[q]),_:1},8,["href","active"])]),e("li",null,[o(d,{href:s.route("products"),active:s.route().current("products")},{default:i(()=>[F]),_:1},8,["href","active"])]),e("li",null,[o(d,{href:s.route("services.index"),active:s.route().current("services.index")},{default:i(()=>[J]),_:1},8,["href","active"])]),e("li",null,[o(d,{href:s.route("blog.index"),active:s.route().current("blog.index")},{default:i(()=>[K]),_:1},8,["href","active"])]),e("li",null,[o(d,{href:s.route("contact.index"),active:s.route().current("contact.index")},{default:i(()=>[Q]),_:1},8,["href","active"])]),u.isAuthenticated?(h(),p("li",T,[o(d,{href:s.route("profile.edit")},{default:i(()=>[G]),_:1},8,["href"]),e("button",{class:"text-red-500 font-semibold",onClick:a[0]||(a[0]=(...l)=>s.logout&&s.logout(...l))},"Logout")])):(h(),p("li",X,[e("button",{class:"text-main-500 font-semibold",onClick:x},"Login"),e("button",{class:"text-blue-500 font-semibold",onClick:$},"Register")]))],2),[[A,t.value]])]))}},ee={},se={target:"_blank",href:"https://www.m.me/onemprl?",class:"messenger-button"},te=k('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" width="100%" height="100%" fill-rule="nonzero" data-v-d25ad945><g fill="#2c8f3b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal;" data-v-d25ad945><g transform="scale(5.12,5.12)" data-v-d25ad945><path d="M25,2c-12.69922,0 -23,9.60156 -23,21.5c0,6.30078 2.89844,12.19922 8,16.30078v8.80078l8.60156,-4.5c2.09766,0.59766 4.19922,0.79688 6.39844,0.79688c12.69922,0 23,-9.59766 23,-21.5c0,-11.79687 -10.30078,-21.39844 -23,-21.39844zM27.30078,30.60156l-5.80078,-6.20312l-10.80078,6.10156l12,-12.69922l5.90234,5.89844l10.5,-5.89844z" data-v-d25ad945></path></g></g></svg><div class="h-7 w-7 fixed bg-white-100 -z-10" data-v-d25ad945></div>',2),oe=[te];function ae(u,r){return h(),p("a",se,oe)}const ie=W(ee,[["render",ae],["__scopeId","data-v-d25ad945"]]),n=u=>(P("data-v-ef84a8ac"),u=u(),D(),u),le={class:"hidden md:block"},ne=k('<div class="md:px-10 lg:px-20 flex sm:px-10 justify-start md:justify-between bg-black text-white w-full text-sm font-light py-1 space-x-2" data-v-ef84a8ac><div class="flex md:justify-start items-center space-x-1 md:space-x-4" data-v-ef84a8ac><div class="flex items-center space-x-2" data-v-ef84a8ac><i class="pi pi-map-marker" data-v-ef84a8ac></i><span data-v-ef84a8ac>Blk 9 Lot 87 Seville St., La Vecina Camella Dos Rios, Cabuyao, Laguna 4025 Cabuyao, Philippines</span></div><a href="mailto:mprlsolar@gmail.com" class="hidden md:flex items-center space-x-2" data-v-ef84a8ac><i class="pi pi-envelope" data-v-ef84a8ac></i><span class="hidden md:block" data-v-ef84a8ac>mprlsolar@gmail.com</span></a></div><div class="hidden md:flex items-center space-x-1 md:space-x-4" data-v-ef84a8ac><a href="https://www.facebook.com/onemprl/" target="_blank" class="flex items-center" data-v-ef84a8ac><i class="pi pi-facebook" data-v-ef84a8ac></i></a><a href="#" class="flex items-center" data-v-ef84a8ac><i class="pi pi-instagram" data-v-ef84a8ac></i></a></div></div>',1),re={class:"flex justify-between py-1 items-center h-30 md:px-10 lg:px-20 sm:px-10"},de={class:"flex flex-col px-4 md:px-2"},ce={class:"flex space-x-5 sm:text-sm md:text-md lg:text-lg"},ue={key:0},he={key:0},pe=n(()=>e("span",{class:"hidden md:block"},"Admin",-1)),fe={class:"md:hidden"},me=n(()=>e("span",{class:"hidden md:block"},"Home",-1)),ve={class:"md:hidden"},ge=n(()=>e("span",{class:"hidden md:block"},"About Us",-1)),be={class:"md:hidden"},_e=n(()=>e("span",{class:"hidden md:block"},"Products",-1)),we={class:"md:hidden"},xe=n(()=>e("span",{class:"hidden md:block"},"Services",-1)),ye={class:"md:hidden"},ke=n(()=>e("span",{class:"hidden md:block"},"Blog",-1)),$e={class:"md:hidden"},Le=n(()=>e("span",{class:"hidden md:block"},"Contact Us",-1)),ze={class:"md:hidden"},Ce={class:"flex items-center space-x-5 px-2"},Me={class:"inline-flex rounded-md"},We={class:"rounded-full cursor-pointer"},Se={key:0,class:"flex flex-col text-sm font-semibold"},Re=n(()=>e("i",{style:{"font-size":"1rem"},class:"pi pi-user"},null,-1)),Be=n(()=>e("span",null,"Account",-1)),je=n(()=>e("i",{style:{"font-size":"1rem"},class:"pi pi-sign-out"},null,-1)),Ae=n(()=>e("span",null,"Logout",-1)),Oe=[je,Ae],Ue={key:1,class:"flex flex-col text-sm font-semibold"},Ne=n(()=>e("i",{class:"pi pi-sign-in"},null,-1)),Pe=n(()=>e("span",null," Login ",-1)),De=[Ne,Pe],Ee=n(()=>e("i",{class:"pi pi-user-plus"},null,-1)),He=n(()=>e("span",null," Sign Up ",-1)),Ie=[Ee,He],Ve={class:"block md:hidden"},Ye=n(()=>e("div",{class:"flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md"},[e("span",{class:"text-2xl font-bold text-gray-800"},"Contact Us"),e("div",{class:"text-center"},[e("span",{class:"block text-sm text-gray-800"},"0916-830-5551"),e("span",{class:"block text-sm text-gray-800"},"0967-362-0733")])],-1)),qe={class:"absolute -right-7 hover:right-0 sm:right-0 h-screen transition-all duration-200"},Fe={id:"icon-handler",class:"flex flex-col h-full justify-center space-y-3"},Je=k('<span class="p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer" data-v-ef84a8ac><a href="https://www.facebook.com/onemprl/" data-v-ef84a8ac><i id="icon-size" style="" class="pi pi-facebook" data-v-ef84a8ac></i></a></span><span class="p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer" data-v-ef84a8ac><i id="icon-size" style="" class="pi pi-instagram" data-v-ef84a8ac></i></span>',2),Ke=n(()=>e("i",{id:"icon-size",style:{},class:"pi pi-phone"},null,-1)),Qe=[Ke],Te=n(()=>e("span",{class:"p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer"},[e("a",{href:"mailto:mprlsolarpanel@gmail.com"},[e("i",{id:"icon-size",style:{},class:"pi pi-envelope"})])],-1)),Ge=O(),Xe={data(){return{showLoginModal:!1,showRegisterModal:!1,showQuoteModal:!1,showContact:!1}},methods:{logout(){this.$inertia.post(route("logout"),{onFinish:()=>{Ge.success("Logged out successfully!")}})},handleRegisterSwitch(){this.showLoginModal=!1,this.showRegisterModal=!0},handleLoginSwitch(){this.showRegisterModal=!1,this.showLoginModal=!0}},computed:{isAuthenticated(){return this.$page.props.auth.user!==null}}},Ze=Object.assign(Xe,{__name:"NavBar",setup(u){const r=w(window.scrollY),t=w(r.value>0),f=w(!1),v=w("right"),c=()=>{f.value?t.value=!0:t.value=r.value>0},y=()=>{r.value=window.scrollY,c()},x=()=>{v.value=window.innerWidth<1200?"right":"left"};z(r,c),z(f,c),U(()=>{x(),window.addEventListener("resize",x),window.addEventListener("scroll",y)}),N(()=>{window.removeEventListener("resize",x),window.removeEventListener("scroll",y)});const $=s=>{f.value=s};return(s,a)=>(h(),p("nav",{class:_([{"bg-white shadow-md fixed":t.value,"bg-none text-white absolute bg-black bg-opacity-10":!t.value},"flex flex-col top-0 w-full z-50 h-30 transition-all duration-500 ease-in-out"])},[e("div",le,[ne,e("div",re,[e("div",de,[o(d,{href:s.route("welcome"),isWhite:t.value},{default:i(()=>[o(M,{isDark:t.value},null,8,["isDark"])]),_:1},8,["href","isWhite"])]),e("div",null,[e("ul",ce,[s.$page.props.auth.user?(h(),p("div",ue,[s.$page.props.auth.user.role_id==1?(h(),p("li",he,[o(d,{class:"hidden:block",href:s.route("dashboard"),active:s.route().current("dashboard"),isWhite:t.value},{default:i(()=>[pe,e("span",fe,[e("i",{style:m([{"font-size":"1.2rem"},t.value?"color:black":"color:white"]),class:"pi pi-shield"},null,4)])]),_:1},8,["href","active","isWhite"])])):C("",!0)])):C("",!0),e("li",null,[o(d,{class:"hidden:block",href:s.route("welcome"),active:s.route().current("welcome"),isWhite:t.value},{default:i(()=>[me,e("span",ve,[e("i",{style:m([{"font-size":"1.2rem"},t.value?"color:black":"color:white"]),class:"pi pi-home"},null,4)])]),_:1},8,["href","active","isWhite"])]),e("li",null,[o(d,{class:"hidden:block",href:s.route("about.index"),active:s.route().current("about.index"),isWhite:t.value},{default:i(()=>[ge,e("span",be,[e("i",{style:m([{"font-size":"1rem"},t.value?"color:black":"color:white"]),class:"pi pi-building"},null,4)])]),_:1},8,["href","active","isWhite"])]),e("li",null,[o(d,{class:"hidden:block",href:s.route("products"),active:s.route().current("products"),isWhite:t.value},{default:i(()=>[_e,e("span",we,[e("i",{style:m([{"font-size":"1rem"},t.value?"color:black":"color:white"]),class:"pi pi-shopping-cart"},null,4)])]),_:1},8,["href","active","isWhite"])]),e("li",null,[o(d,{class:"hidden:block",href:s.route("services.index"),active:s.route().current("services.index"),isWhite:t.value},{default:i(()=>[xe,e("span",ye,[e("i",{style:m([{"font-size":"1rem"},t.value?"color:black":"color:white"]),class:"pi pi-briefcase"},null,4)])]),_:1},8,["href","active","isWhite"])]),e("li",null,[o(d,{class:"hidden:block",href:s.route("blog.index"),active:s.route().current("blog.index")||s.route().current("blog.show"),isWhite:t.value},{default:i(()=>[ke,e("span",$e,[e("i",{style:m([{"font-size":"1rem"},t.value?"color:black":"color:white"]),class:"pi pi-pencil"},null,4)])]),_:1},8,["href","active","isWhite"])]),e("li",null,[o(d,{class:"hidden:block",href:s.route("contact.index"),active:s.route().current("contact.index"),isWhite:t.value},{default:i(()=>[Le,e("span",ze,[e("i",{style:m([{"font-size":"1rem"},t.value?"color:black":"color:white"]),class:"pi pi-phone"},null,4)])]),_:1},8,["href","active","isWhite"])])])]),e("div",Ce,[o(E,{align:v.value,width:"32"},{trigger:i(()=>[e("span",Me,[e("span",We,[e("i",{class:"pi pi-user",style:m([{"font-size":"1.2em"},t.value?"color:black":"color:white"])},null,4)])])]),content:i(()=>[s.isAuthenticated?(h(),p("div",Se,[o(g(b),{href:s.route("profile.edit"),class:"flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1"},{default:i(()=>[Re,Be]),_:1},8,["href"]),e("button",{type:"button",onClick:a[0]||(a[0]=(...l)=>s.logout&&s.logout(...l)),class:"flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1"},Oe)])):(h(),p("div",Ue,[e("button",{onClick:a[1]||(a[1]=l=>s.showLoginModal=!0),class:"flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1"},De),e("button",{onClick:a[2]||(a[2]=l=>s.showRegisterModal=!0),class:"flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1"},Ie)]))]),_:1},8,["align"])])])]),e("div",Ve,[o(Z,{"onUpdate:isHamburgerOpen":$,onShowLoginModal:a[3]||(a[3]=l=>s.showLoginModal=!0),onShowRegisterModal:a[4]||(a[4]=l=>s.showRegisterModal=!0),"is-authenticated":s.isAuthenticated,isWhite:t.value},null,8,["is-authenticated","isWhite"])]),o(L,{maxWidth:"md",show:s.showContact,"onUpdate:show":a[5]||(a[5]=l=>s.showContact=l),onClose:a[6]||(a[6]=l=>s.showContact=!1)},{default:i(()=>[Ye]),_:1},8,["show"]),o(L,{maxWidth:"md",show:s.showLoginModal,"onUpdate:show":a[8]||(a[8]=l=>s.showLoginModal=l),onClose:a[9]||(a[9]=l=>s.showLoginModal=!1)},{default:i(()=>[o(H,{onOpenRegister:s.handleRegisterSwitch,onCloseLogin:a[7]||(a[7]=l=>s.showLoginModal=!1)},null,8,["onOpenRegister"])]),_:1},8,["show"]),o(L,{maxWidth:"md",show:s.showRegisterModal,"onUpdate:show":a[11]||(a[11]=l=>s.showRegisterModal=l),onClose:a[12]||(a[12]=l=>s.showRegisterModal=!1)},{default:i(()=>[o(I,{onOpenLogin:s.handleLoginSwitch,onCloseRegister:a[10]||(a[10]=l=>s.showRegisterModal=!1)},null,8,["onOpenLogin"])]),_:1},8,["show"]),e("div",qe,[e("section",Fe,[Je,e("span",{onClick:a[13]||(a[13]=l=>s.showContact=!0),class:"p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer"},Qe),Te]),o(ie)])],2))}}),ys=W(Ze,[["__scopeId","data-v-ef84a8ac"]]),es={class:"flex flex-col pt-4 space-y-2 bg-white-200"},ss=e("section",{class:"text-center px-8 md:px-16"},[e("h1",{class:"text-xl font-semibold text-main-500 text-pretty"},"ONEMPRL Solar Power Corporation"),e("p",{class:"font-light text-sm"},"ONEMPRL Solar Power Corporation specializes in supplying efficient and eco-friendly solar-powered LED lights. Our lights offer easy installation and come in a variety of types, styles, sizes, and colors. Say goodbye to electrical wiring - our lights run on solar power, making them both convenient and environmentally friendly.")],-1),ts={class:"py-3"},os={class:"flex items-center justify-center space-x-5 sm:text-sm md:text-nm lg:text-md text-blue-500"},as=e("span",{class:"hidden md:block"},"Home",-1),is=e("span",{class:"md:hidden"},[e("i",{style:{"font-size":"1.2rem"},class:"pi pi-home"})],-1),ls=e("span",{class:"hidden md:block"},"About Us",-1),ns=e("span",{class:"md:hidden"},[e("i",{style:{"font-size":"1.2rem"},class:"pi pi-building"})],-1),rs=e("span",{class:"hidden md:block"},"Services",-1),ds=e("span",{class:"md:hidden"},[e("i",{style:{"font-size":"1.2rem"},class:"pi pi-briefcase"})],-1),cs=e("span",{class:"hidden md:block"},"Blog",-1),us=e("span",{class:"md:hidden"},[e("i",{style:{"font-size":"1.2rem"},class:"pi pi-pencil"})],-1),hs=e("span",{class:"hidden md:block"},"Contact Us",-1),ps=e("span",{class:"md:hidden"},[e("i",{style:{"font-size":"1.2rem"},class:"pi pi-phone"})],-1),fs=k('<section class="flex justify-center text-sm h-full"><div class="flex flex-col justify-center items-center pe-4"><i style="font-size:1.2rem;" class="pi pi-envelope"></i><span class="hidden md:block">mprlsolar@gmail.com</span></div><div class="flex flex-col justify-center items-center px-6 border-x"><i style="font-size:1.2rem;" class="pi pi-map-marker"></i><span class="hidden md:block">Blk 9 Lot 87 Seville St., La Vecina Camella Dos Rios, Cabuyao, Laguna 4025 Cabuyao, Philippines</span></div><div class="flex flex-col justify-around items-center ps-4 space-y-2"><i style="font-size:1.2rem;" class="pi pi-phone"></i><div class="flex flex-col"> 0916-830-5551 0967-362-0733 </div></div></section><section class="text-center bg-main-500 text-white text-sm py-1"><h2>ONEMPRL Solar Power Corporation © 2024. All Rights Reserved.</h2></section>',2),ks={__name:"Footer",setup(u){return(r,t)=>(h(),p("footer",null,[e("div",es,[ss,e("section",ts,[e("ul",os,[e("li",null,[o(g(b),{href:r.route("welcome")},{default:i(()=>[as,is]),_:1},8,["href"])]),e("li",null,[o(g(b),{href:r.route("about.index")},{default:i(()=>[ls,ns]),_:1},8,["href"])]),e("li",null,[o(g(b),{href:r.route("services.index")},{default:i(()=>[rs,ds]),_:1},8,["href"])]),e("li",null,[o(g(b),{href:r.route("blog.index")},{default:i(()=>[cs,us]),_:1},8,["href"])]),e("li",null,[o(g(b),{href:r.route("contact.index")},{default:i(()=>[hs,ps]),_:1},8,["href"])])])]),fs])]))}};export{ys as N,ks as _};
