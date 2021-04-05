#### Установка ingress-nginx/prometheus/grafana:
````
cat <<EOF | kubectl apply -f -
apiVersion: v1
kind: Namespace
metadata:
  name: ingress-nginx
EOF
helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx
helm repo update
helm install ingress-controller ingress-nginx/ingress-nginx --namespace ingress-nginx --set controller.metrics.enabled=true --set-string controller.podAnnotations."prometheus\.io/scrape"="true" --set-string controller.podAnnotations."prometheus\.io/port"="10254"
kubectl apply --kustomize github.com/kubernetes/ingress-nginx/deploy/prometheus/
kubectl apply --kustomize github.com/kubernetes/ingress-nginx/deploy/grafana/
````
#### Развёртывание приложения для тестов:
````
kubectl apply -f https://github.com/cfenyev/dp32/raw/main/w3test1.yaml
````
#### Создание нагрузки:
[http://146.148.69.163.xip.io/w3test1/_**{HTTP CODE}**_/auto.php]()\
сейчас доступны коды 100,200,300,400,500
#### Публикация мониторинга (сейчас Grafana, можно поменять на Prometheus):
````kubectl apply -f https://github.com/cfenyev/dp32/raw/main/monitoring-ext.yaml````
