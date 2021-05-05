export default {
	emits: ['dislike'],
	methods: {
		toggleLike(internship) {
			axios.post(route('likes.store', internship)).then(() => {
				if(internship.liked) {
					internship.liked = false;
					this.$page.props.auth.user.likes_count--;
					this.$emit('dislike', internship);
				} else {
					internship.liked = true;
					this.$page.props.auth.user.likes_count++;
				}
			}).catch(err => console.log(err));
		}
	}
}