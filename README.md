# DEMO-LARAVEL

## Start Dev

```bash
# 安装依赖
if [ ! -d "vendor" ]; then
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
fi

# 创建 .env
if [ ! -f ".env" ]; then
  cp .env.example .env
fi

# 手动修改 .env

# 修改 sail 基础镜像
sed -i '' 's/TZ=UTC/TZ=PRC/' vendor/laravel/sail/runtimes/8.0/Dockerfile
sed -i '' "/RUN apt-get update/i \\
RUN sed -i 's/archive.ubuntu.com/mirrors.ustc.edu.cn/g' /etc/apt/sources.list\\
" vendor/laravel/sail/runtimes/8.0/Dockerfile

# 启动容器
./vendor/bin/sail up -d

# 生成 key
sail artisan key:generate

# 执行迁移并填充假数据
sail artisan migrate

# 填充假数据
sail artisan db:seed

# 安装前端依赖
if [ ! -d "node_modules" ]; then
  yarn
fi
```
