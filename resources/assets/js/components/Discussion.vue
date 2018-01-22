<template>
	<div>
		<div class="field">
          <label class="label">Message</label>
            <div class="control">
              <textarea class="textarea" placeholder="Textarea" v-model="message"></textarea>
            </div>
            <br>
<a class="button is-link" @click="addDiscusion">Save</a>

          </div>

            <div class="box">
                <article class="media" v-for="discussion in discussions">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img :src="discussion.user.avatar" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>{{ discussion.user.name }}</strong>  <small>31m</small>
                        <br>
                        {{ discussion.message }}
                      </p>
                    </div>
                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a class="level-item">
                          <span class="icon is-small"><i class="fa fa-reply"></i></span>
                        </a>
                      </div>
                    </nav>
                  </div>
                </article>
              </div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['product_id'],
		data(){
			return{
				pagination: {
		            total: 0,
		            per_page: 1,
		            from: 1,
		            to: 0,
		            current_page: 1
		       },
		       message:'',
		       discussions:{}
			}
		},
		mounted(){
			this.fetchDiscussions();
		},
		methods:{
			fetchDiscussions(){
				let url='api/productdiscussions?page='+this.pagination.current_page;
				axios.get(url,{params:{product_id:this.product_id}}).then(response=>{
					this.pagination=response.data
				})
			},
			// axios.get('api/productreviews?page='+this.pagination.current_page,{params:{id:'{!! $product->id !!}'}}).then(response=>{
   //        this.reviews=response.data.data;
   //        this.pagination=response.data;
   //      })
			addDiscusion(){
				let url='discussion';
				axios.post(url,{product_id:this.product_id,message:this.message}).then(response=>{
					console.log(response)
				})
			}
		},
		watch:{
			pagination(value,oldValue){
				this.discussions=value.data;
			}
		}
	}
</script>