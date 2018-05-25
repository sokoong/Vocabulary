<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>คำศัพท์</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body ng-controller="AppController as app" ng-init="app.init()">
	<table cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<th width="51"></th>
				<th width="121">คำศัพท์</th>
				<th width="156">คำอ่าน</th>
				<th width="182">คำแปล</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, word) in app.words">
				<td>{{key + 1}}</td>
				<td>{{word[0]}}</td>
				<td>{{word[1]}}</td>
				<td>
					<input type="text" ng-if="app.quiz" ng-focus="app.quiz" on-enter="app.submit(key, word)" ng-model="app.currentText[key]" /><span ng-if="!app.quiz">{{word[2]}}</span>
					<p ng-if="word[3]">{{word[3]}}</p>
				</td>
			</tr>
		</tbody>
	</table>
	<div>
		<button id="loadmore" ng-if="!app.quiz" ng-click="app.loadmore()">Loadmore</button>
	</div>

	<a ng-href="{{app.quiz ? '/' : '/?try'}}" id="quiz" >{{app.quiz ? 'End' : 'Try'}}</a>

	<script type="text/javascript" src="words.js"></script>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>