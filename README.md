一款简单的文档生成工具

演示：http://project.leezhong.com/doc-generator/

## 环境要求

php 5+
web server (nginx/apache...)

## 安装

免安装

## 使用

- 打开index.php，修改`$projectName`为自己的项目名
- 所有的文档都放到data文件夹下
- 浏览器访问指定的文件夹即可

## 文档的书写规范

- 以数字开头，以"-"作为分隔符，以.md结尾
- 如果有子分类，则加".n"
- 数字越小，显示时排得越前
- 如果有超过9项，第10项时，请从a开始

### demo

	1-install.md
	2-basic.md
	2.1-workflow.md
	2.2-request.md
	...
	2.a-session.md

## 文档内容

- 每篇文档，请保证有一个h1，也就是#
- 如果有h2(##)，则h2会被提取出来，作为左栏的子节点

### demo
	# 安装
	...

	## 手动安装
	...

	## 自动安装
