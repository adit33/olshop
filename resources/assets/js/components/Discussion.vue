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
            <ul style="list-style-type:none" v-for="(discussion,index) in discussions">
            <li>
            	<article class="media">
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
                          <span class="icon is-small"  @click="showReply(index)"><i class="fa fa-reply"></i></span>
                        </a>
                      </div>
                    </nav>
                    <nav class="level is-mobile" v-if="discussion.children" v-for="children in discussion.children">
                      <div class="level-left">
                      <div class="level-item">
								<article class="media">
				                  <div class="media-left">
				                    <figure class="image is-64x64">
				                      <img :src="children.user.avatar" alt="Image">
				                    </figure>
				                  </div>
				                  <div class="media-content">
				                    <div class="content">
				                      <p>
				                        <strong>{{ children.user.name }}</strong>  <small>31m</small>
				                        <br>
				                        {{ children.message }}
				                      </p>
				                    </div>
				                  </div>
				                </article>
                      </div>
                      </div>
                    </nav>
                  </div>
                </article>
                 <div class="field"  v-if="discussion.reply">
		          <label class="label">Message</label>
		            <div class="control">
		              <textarea class="textarea" placeholder="Textarea" v-model="discussion.reply_message"></textarea>
		            </div>
		            <br>
						<a class="button is-link" @click="replyDiscussion(discussion,index)">Save</a>
		          </div>

            </li>
            </ul>
          <!--   <div  v-for="(discussion,index) in discussions">
                <article class="media">
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
                          <span class="icon is-small"  @click="showReply(index)"><i class="fa fa-reply"></i></span>
                        </a>
                      </div>
                    </nav>
                  </div>
                </article>
                <div class="field"  v-if="discussion.reply">
		          <label class="label">Message</label>
		            <div class="control">
		              <textarea class="textarea" placeholder="Textarea" v-model="discussion.reply_message"></textarea>
		            </div>
		            <br>
						<a class="button is-link" @click="replyDiscussion(discussion)">Save</a>

		          </div>
          </div> -->
                  <vue-pagination  v-bind:pagination="pagination"
                 v-on:click.native="fetchDiscussions(pagination.current_page)"
                 :offset="2">
              </vue-pagination>
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
					let tmp=response.data.data;
					tmp.forEach((val)=>{
						this.$set(val,'reply',false)
						this.$set(val,'reply_message','')
					})
					this.discussions=tmp

				})
			},
			// axios.get('api/productreviews?page='+this.pagination.current_page,{params:{id:'{!! $product->id !!}'}}).then(response=>{
   //        this.reviews=response.data.data;
   //        this.pagination=response.data;
   //      })
			addDiscusion(){
				let url='discussion';
				axios.post(url,{product_id:this.product_id,message:this.message}).then(response=>{
					this.discussions.push(response.data);
					this.message=''
				})
			},
			replyDiscussion(value,index){
				let url='discussion';
				axios.post(url,{product_id:this.product_id,parent_id:value.id,message:value.reply_message}).then(response=>{
					this.discussions[index]['children'].push(response.data)	
					this.discussions[index].reply_message=''
				});
				
			},
			showReply(index){
				this.discussions[index].reply = !this.discussions[index].reply
			}
		},
		watch:{
		
		}
	}
</script>