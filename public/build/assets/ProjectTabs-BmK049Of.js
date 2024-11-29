import{d as c,e as n,g as e,F as g,q as m,h as _,y as d,Y as y,k as h,f,j as x,I as v,s as b}from"./app-Bggvsate.js";import{_ as j}from"./_plugin-vue_export-helper-DlAUqK2U.js";const C={name:"CustomCarousel",props:{projectCategory:{type:Array,default:()=>[],required:!0},projects:{type:Array,default:()=>[],required:!0},itemsPerPage:{type:Number,default:2}},data(){return{selectedCategory:null,currentSlide:0,selectedProject:null,currentImageIndex:0}},computed:{paginatedProjects(){return this.filteredProjects.reduce((r,u,p)=>{const t=Math.floor(p/1);return r[t]||(r[t]=[]),r[t].push(u),r},[])},filteredProjects(){return this.selectedCategory===null?this.projects:this.projects.filter(l=>l.category_id===this.selectedCategory)},currentImage(){return this.selectedProject&&this.selectedProject.images&&this.selectedProject.images.length>0?`/storage/${this.selectedProject.images[this.currentImageIndex].images}`:"/images/products-images/solarpanel.png"}},mounted(){this.projectCategory.length>0&&(this.selectedCategory=this.projectCategory[0].id)},methods:{prevSlide(){this.currentSlide=(this.currentSlide-1+this.paginatedProjects.length)%this.paginatedProjects.length},nextSlide(){this.currentSlide=(this.currentSlide+1)%this.paginatedProjects.length},goToSlide(l){this.currentSlide=l},selectCategory(l){this.selectedCategory=l,this.currentSlide=0},openModal(l){this.selectedProject=l,this.currentImageIndex=0},closeModal(){this.selectedProject=null},getCategoryName(l){const r=this.projectCategory.find(u=>u.id===l);return r?r.name:"Unknown"},setCurrentImage(l){this.currentImageIndex=l}}},P={class:"flex border-b-2"},k=["onClick"],S={class:"carousel grid grid-cols-1 md:grid-cols-2 gap-4 mt-5"},I={class:""},w=["onClick"],M=["src"],z={class:"mt-5"},N={class:"font-bold text-lg text-blue-500"},T={class:"flex"},V={class:"text-blue-600 font-semibold text-sm"},q={class:"text-orange-500"},B={class:"text-blue-600 font-semibold text-sm ml-5"},F={class:"text-orange-500"},W={class:"carousel-dots"},D=["onClick"],E={key:0,class:"fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"},H={class:"bg-white p-6 rounded-lg max-w-4xl w-full relative modal-content"},L={class:"text-2xl font-bold mb-6 text-blue-800"},O={class:"flex flex-col md:flex-row"},U={class:"w-full md:w-1/2 pr-0 md:pr-4 mb-4 md:mb-0"},X={class:"relative h-64 mb-4"},Y=["src"],G={class:"flex space-x-2 overflow-x-auto"},J=["src","onMouseenter","onClick"],K={class:"w-full md:w-1/2 pl-0 md:pl-4"},Q={class:"text-3xl font-semibold mb-4"},R={class:"mb-2"},Z=e("span",{class:"font-semibold text-orange-500"},"System Size:",-1),A={class:"mb-4"},$=e("span",{class:"font-semibold text-orange-500"},"Monthly Savings:",-1),ee={class:"h-32 overflow-y-auto"},te={class:"text-gray-700 text-md"};function se(l,r,u,p,t,o){return c(),n("div",null,[e("div",P,[(c(!0),n(g,null,m(u.projectCategory,s=>(c(),n("div",{key:s.id,onClick:i=>o.selectCategory(s.id),class:_(["cursor-pointer px-4 py-2",t.selectedCategory===s.id?"active-tab":"inactive-tab"])},d(s.name),11,k))),128))]),e("div",S,[e("div",I,[e("div",{class:"carousel-inner",style:y({transform:`translateX(-${t.currentSlide*100}%)`})},[(c(!0),n(g,null,m(o.paginatedProjects,(s,i)=>(c(),n("div",{class:"carousel-item m-4 p-4",key:i},[(c(!0),n(g,null,m(s,a=>(c(),n("div",{class:"project-card cursor-pointer",key:a.id,onClick:oe=>o.openModal(a)},[e("img",{src:a.first_image?`/storage/${a.first_image.images}`:"/images/products-images/solarpanel.png",class:"w-full h-60 object-cover rounded-2xl shadow-xl"},null,8,M),e("div",z,[e("h3",N,d(a.title),1),e("div",T,[e("p",V,[h("System Size: "),e("span",q,d(a.system_size)+"kWp",1)]),e("p",B,[h("Monthly Saving: "),e("span",F,"₱"+d(a.monthly_saving)+"/month",1)])])])],8,w))),128))]))),128))],4),e("button",{class:"carousel-control-prev",onClick:r[0]||(r[0]=(...s)=>o.prevSlide&&o.prevSlide(...s))},"❮"),e("button",{class:"carousel-control-next",onClick:r[1]||(r[1]=(...s)=>o.nextSlide&&o.nextSlide(...s))},"❯")])]),e("div",W,[(c(!0),n(g,null,m(o.paginatedProjects,(s,i)=>(c(),n("span",{key:i,class:_(["dot",{active:t.currentSlide===i}]),onClick:a=>o.goToSlide(i)},null,10,D))),128))]),f(v,{name:"modal"},{default:x(()=>[t.selectedProject?(c(),n("div",E,[e("div",H,[e("button",{onClick:r[2]||(r[2]=(...s)=>o.closeModal&&o.closeModal(...s)),class:"absolute top-4 right-4 text-2xl"},"×"),e("h2",L,d(o.getCategoryName(t.selectedProject.category_id))+" Project Highlight",1),e("div",O,[e("div",U,[e("div",X,[f(v,{name:"fade",mode:"out-in"},{default:x(()=>[(c(),n("img",{key:t.currentImageIndex,src:o.currentImage,class:"w-full h-full object-cover rounded-lg absolute top-0 left-0",alt:"Project Image"},null,8,Y))]),_:1})]),e("div",G,[(c(!0),n(g,null,m(t.selectedProject.images,(s,i)=>(c(),n("img",{key:s.id,src:`/storage/${s.images}`,onMouseenter:a=>o.setCurrentImage(i),onClick:a=>o.setCurrentImage(i),class:_(["w-16 h-16 object-cover rounded cursor-pointer transition-opacity duration-300",{"opacity-50":i!==t.currentImageIndex,"ring-2 ring-blue-500":i===t.currentImageIndex}]),alt:"Thumbnail"},null,42,J))),128))])]),e("div",K,[e("h3",Q,d(t.selectedProject.title),1),e("p",R,[Z,h(" "+d(t.selectedProject.system_size)+" kWp ",1)]),e("p",A,[$,h(" Over ₱"+d(t.selectedProject.monthly_saving),1)]),e("div",ee,[e("p",te,d(t.selectedProject.content),1)])])])])])):b("",!0)]),_:1})])}const ce=j(C,[["render",se]]);export{ce as default};
