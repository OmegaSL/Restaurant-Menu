<html>

<head>
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
	<h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>

	<div x-data="{ count: 0 }">
		<button x-on:click="count++">Increment</button>

		<span x-text="count"></span>
		Input: <input type="text" x-model="count">
	</div>
	<br>
	<div x-data="{ open: false }">
		<button @click="open = ! open">Toggle Content</button>

		<div x-show="open">
			Content...
		</div>
	</div>

	<div x-data="{ open: false, toggle() { this.open = !this.open } }">
		<button @click="toggle()">Toggle Content</button>

		<div x-show="open">
			Content...
		</div>
	</div>

	<div x-data="{ open: true }">
		<button @click="open = false" x-show="open">Hide Me</button>
	</div>
</body>

</html>
